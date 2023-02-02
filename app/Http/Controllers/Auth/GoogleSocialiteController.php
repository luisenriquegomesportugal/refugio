<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleSocialiteController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(UserRepositoryInterface $userRepository)
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();
        
        $user = $userRepository->findByEmail($googleUser->email);

        if (!$user) {
            $user = new User([
                "google_id" => $googleUser->id,
                "nome_completo" => $googleUser->name,
                "nome" => Arr::get($googleUser->user, 'given_name', $googleUser->name),
                "email" => $googleUser->email,
                "foto" => $googleUser->avatar,
            ]);

            $userSaved = $userRepository->save($user);

            if (!$userSaved) {
                throw new AuthorizationException('Falha ao salvar o usuário na base');
            }
        }

        if (!$user->acesso) {
            throw new AuthorizationException('Você não tem permissão para acessar, aguarde seu Supervisor liberar seu acesso');
        }

        Auth::loginUsingId($user->id);

        return response()
            ->redirectToRoute('admin.dashboard');
    }
}
