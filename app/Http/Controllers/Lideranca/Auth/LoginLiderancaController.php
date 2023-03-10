<?php

namespace App\Http\Controllers\Lideranca\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginLiderancaController extends Controller
{
    public function redirect()
    {
        Auth::loginUsingId(1);
        return redirect()->intended(route('lideranca.inicio'));

//        return Socialite::driver('google')->redirect();
    }

    public function callback(UserRepositoryInterface $userRepository)
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        $user = $userRepository->findByEmail($googleUser->email);

        if (!$user)
        {
            $user = new User([
                "google_id" => $googleUser->id,
                "nome_completo" => $googleUser->name,
                "nome" => Arr::get($googleUser->user, 'given_name', $googleUser->name),
                "email" => $googleUser->email,
                "foto" => $googleUser->avatar,
            ]);

            $userSaved = $userRepository->save($user);

            if (!$userSaved) {
                return response('Falha ao salvar o usuário na base', 401);
            }

            $user->refresh();
        }

        if ($user->permissoes->isEmpty())
        {
            return response('Você não tem permissão para acessar, aguarde seu Supervisor liberar seu acesso', 401);
        }

        Auth::loginUsingId($user->id);

        return redirect()->intended(route('lideranca.inicio'));
    }
}
