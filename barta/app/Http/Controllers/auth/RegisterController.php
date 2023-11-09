<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
       $request->validated();
       // Data Store

       Register::create([
            'full_name' => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
       ]);
    return redirect()->route('login.page')->with('success','Your Register Successful Now You Login');
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
        if(!Auth::guard('register')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            $this->validate($request,[
                'email' => 'required|exists:registers,email',
                'password' => 'required|exists:registers,password',
            ]);
        }else{
           return redirect()->route('home.page');
        }
    }

}
