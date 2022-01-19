<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view("auth.login");
    }
    public function register_view(){
        return view("auth.register");
    }
    public function login(Request $req){
        $req->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect("home");
        }else{
            return redirect("login")->withErrors("Login Details Are Not Valid");
        }
    }
    public function register(Request $req){
        $req->validate([
            "name"=>"required|min:3",
            "email"=>"required|unique:users|email",
            "password"=>"required|min:6"
        ]);
        $add = new User();
        $add->name = $req->name;
        $add->email = $req->email;
        $add->password = Hash::make($req->password);
        $add->save();
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){
            return redirect("home");
        }
        return redirect("register")->withErrors("errors");
    }
    public function home(){
        return view("dashboard");
    }
    public function logout(){
        session()->flush();
        Auth::logout();
        return redirect("/");
    }
}
