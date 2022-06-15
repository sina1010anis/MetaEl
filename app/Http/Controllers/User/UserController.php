<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function register_page()
    {
        if (auth()->check()){
            return redirect()->route('user.home');
        }else{
            return Inertia::render('User/HomeLoginAndRegister' , [
                'csrf' => csrf_token(),
                'status' => 'register'
            ]);
        }
    }
    public function login_page()
    {
        if (auth()->check()){
            return redirect()->route('user.home');
        }else{
            return Inertia::render('User/HomeLoginAndRegister' , [
                'csrf' => csrf_token(),
                'status' => 'login'
            ]);
        }
    }
    public function home()
    {
        if (auth()->check()){
            return Inertia::render('User/Layouts/ProfileVue');
        }else{
            return Inertia::render('User/HomeLoginAndRegister' , [
                'csrf' => csrf_token(),
                'status' => 'register'
            ]);
        }
    }
}
