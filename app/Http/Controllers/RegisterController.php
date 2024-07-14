<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{

    public function index(): View
    {
        return view('registration');
    }

    public function registerUser(RegisterUserRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('login.view')->withInput($request->only('email'));
    }

}
