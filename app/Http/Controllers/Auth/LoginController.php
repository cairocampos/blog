<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view("auth.login");
    }

    public function authenticate(Request $request) 
    {   
        $credentials = $request->only(["email", "password"]);
        $validator = $this->validator($credentials);

        if($validator->fails()) {
            return redirect()->route("login")
                ->withErrors($validator)
                ->withInput();
        }

        if(!Auth::attempt($credentials)) {
            $validator->errors()->add("email", "Email e/ou senha inválidos!");
            return redirect()->route("login")
                ->withErrors($validator)
                ->withInput();
        }

        return redirect()->route("home");

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    private function validator($data)
    {
        return Validator::make($data, [
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
    }
}
