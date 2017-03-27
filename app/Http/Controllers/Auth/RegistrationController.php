<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.registration');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param RegistrationRequest $request
     * @return User
     * @internal param array $data
     */
    public function create(RegistrationRequest $request)
    {
        User::create($request->all());

        $redirect = route('login');

        return response()->json(compact('redirect'));
    }
}
