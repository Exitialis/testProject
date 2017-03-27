<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\UpdateProfileRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Страница профиля пользователя.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('profile');
    }

    /**
     * Метод для получения профиля пользователя.
     *
     * @param $userId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile($userId, Request $request)
    {
        $profile = User::find($userId);

        return response()->json(compact('profile'));
    }

    /**
     * Обновление профиля пользователя.
     *
     * @param $userId
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function setProfile($userId, UpdateProfileRequest $request)
    {
        User::find($userId)->update($request->all());

        return response()->json(flash('Профиль был успешно обновлен.'));
    }
}
