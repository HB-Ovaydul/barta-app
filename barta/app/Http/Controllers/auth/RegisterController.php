<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /**
     * Show register page method.
     */
    public function registerPage()
    {
        return view('frontend.auth.register.register');
    }

    /**
     * Get Register.
     */
    public function userRegister(UserRegisterRequest $request)
    {
        // Data validation
        $validated = $request->validated();
        // Data Store

        Register::create([
            'id' => Str::uuid(),
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login.page')->with('success', 'Your Register Successful Now You Login');
    }

    /**
     * Show Login Page
     */
    public function loginPage()
    {
        return view('frontend.auth.login.login');
    }

    /**
     * login
     */
    public function loginUser(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //  dd($validate);

        if (Auth::guard('register')->attempt($validate)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     *  User Logout
     */
    public function logOut()
    {
        Auth::guard('register')->logout();

        return redirect()->route('login.page');

    }
}
