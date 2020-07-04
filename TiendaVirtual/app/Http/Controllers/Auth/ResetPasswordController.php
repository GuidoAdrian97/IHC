<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

use Illuminate\Http\Request;

use App\Categoria;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectPath()
    {
        if (auth()->user()->havepermisos('admin')) {
            return '/admin';
        }

        return '/';
    }
    public function showResetForm(Request $request, $token = null)
    {
         $categorias=Categoria::orderBy('nombre_Cat')->get();
        return view('auth.passwords.reset',compact('categorias'))->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
