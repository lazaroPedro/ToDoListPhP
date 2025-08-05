<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AuthManager extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function loginPost(Request $request){
        $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $credentials = $request->only("email", "password");
        if(Auth::attempt($credentials)){
            return redirect()->intended(route("home"));
        }
        return redirect(route("login"))->with("error", "Email ou Senha Incorretos");
    }
    public function register(){
        return view("auth.register");
    }
    public function registerPost(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;

        if($user->save()){
            return redirect(route("login"))->with("success", "Sucesso");
        }
        return redirect(route("register"))->with("error", "Email ou Senha Incorretos");
    }
}
