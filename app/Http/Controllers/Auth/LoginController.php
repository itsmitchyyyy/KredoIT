<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $validator = validator()->make($request->all(), [
            'email' => ['email', 'required'],
            'password' => ['required','min:8']
        ]);

        if($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator);
        }

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if(Auth::user()->user_status == 'DEACTIVATED'){
                    Auth::logout();
                    return redirect()->route('login')
                        ->withErrors(['email' => 'Your account is deactivated']);
                } else{
                    return redirect()->route('home');
                }
            } else {
                return redirect()->route('login')
                    ->withErrors(['email' => 'Invalid Credentials']);
            }
        }
    }

    public function logout(Request $request) {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();   

        return redirect()->route('login');
    }

    public function guard(){
        return Auth::guard();
    }
}
