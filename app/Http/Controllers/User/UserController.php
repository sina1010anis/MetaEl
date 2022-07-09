<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Item;
use App\Models\Menu;
use Inertia\Inertia;
use App\Models\Banner;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResources;

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
            return Inertia::render('User/ProfileIndexVue');
        }else{
            return Inertia::render('User/HomeLoginAndRegister');
        }
    }
}
