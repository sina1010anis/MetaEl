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
use App\Http\Resources\AddressCollection;
use App\Http\Resources\CartResources;
use App\Http\Resources\CommentCollection;
use App\Models\Address;
use App\Models\CommentProduct;
use App\Models\factor;
use App\Models\News;

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
            return Inertia::render('User/ProfileIndexVue' , [
                'auth' => auth()->check(),
                'data' =>[
                    'time' => jdate()->format('%A, %d %B %y'),
                    'factor' => factor::whereUser_id(auth()->user()->id)->orderBy('id' , 'DESC')->get(),
                    'comment' => new CommentCollection(CommentProduct::whereUserId(auth()->user()->id)->orderBy('id' , 'DESC')->get()),
                    'address' => new AddressCollection(Address::whereUserId(auth()->user()->id)->orderBy('id' , 'DESC')->get()),
                    'news' => News::orderBy('id' , 'DESC')->get(),
                ]
            ]);
        }else{
            return Inertia::render('User/HomeLoginAndRegister');
        }
    }
}
