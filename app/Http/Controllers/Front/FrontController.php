<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\SunMenu;
use App\Repository\Front\GetData;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontController extends Controller
{
    public function home_page(GetData $getDataMenu)
    {
        return Inertia::render('Front/HomePage' , [
            'imageSlider' => Slider::whereStatus(1)->get(),
            'auth' => auth()->check(),
            'data' => [
                'menu' => Menu::whereStatus(1)->get()
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
