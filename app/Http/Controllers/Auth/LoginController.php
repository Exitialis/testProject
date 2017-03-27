<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Страница авторизации пользователя.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Авторизация пользователя.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $status = \Auth::attempt([
            'phone' => $request->input('phone'),
            'password' => $request->input('password')
        ], true);

        if ( ! $status) {
            return response()->json(flash('Неверный логин или пароль', 'error'));
        }

        $redirect = route('profile', auth()->id());

        return response()->json(compact('redirect'));
    }
}
