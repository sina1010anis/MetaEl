<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResources;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SunMenu;
use App\Repository\Front\GetData;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontController extends Controller
{
    public function home_page(GetData $getDataMenu)
    {
        $data_cart = (auth()->check()) ? new CartResources(Cart::whereUser_id(auth()->user()->id)->get()) : '';
        $toal_price_all = (auth()->check()) ? Cart::whereUser_id(auth()->user()->id)->sum('total_price'): '';
        $toal_count_all = (auth()->check()) ? Cart::whereUser_id(auth()->user()->id)->sum('number'): '';
        return Inertia::render('Front/HomePage' , [
            'imageSlider' => Slider::whereStatus(1)->get(),
            'auth' => auth()->check(),
            'data' => [
                'menu' => Menu::whereStatus(1)->get(),
                'items' => Item::get(),
                'bannerS' => Banner::whereLocation('start')->get(),
                'bannerC' => Banner::whereLocation('center')->get(),
                'bannerE' => Banner::whereLocation('end')->get(),
                'products_mobile' => Product::whereIn('sub_menu_id' , [1,2])->get(),
                'products_laptop' => Product::whereIn('sub_menu_id',[3,4])->get(),
                'products_office' => Product::whereIn('sub_menu_id',[5,6])->get(),
                'data_cart' => $data_cart,
                'total_price' =>  $toal_price_all,
                'total_count' =>  $toal_count_all,
            ],
        ]);
    }

    public function view_menu(Request $request)
    {
        return response()->json(SunMenu::whereMenu_id($request->id)->get());
    }

    public function get_data_image(Request $request)
    {
        return ($request->ajax()) ? response()->json(Slider::whereName($request->name)->first()) : 'not ajax';
    }
}
