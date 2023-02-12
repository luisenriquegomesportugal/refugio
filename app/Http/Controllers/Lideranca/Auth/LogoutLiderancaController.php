<?php

namespace App\Http\Controllers\Lideranca\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutLiderancaController extends Controller
{
    public function execute()
    {
        Auth::logout();

        return response()
            ->redirectToRoute('inicio');
    }
}
