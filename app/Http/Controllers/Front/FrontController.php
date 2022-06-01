<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\SunMenu;
use App\Repository\Front\GetDataMenu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FrontController extends Controller
{
    public function home_page(GetDataMenu $getDataMenu)
    {
        return Inertia::render('Front/HomePage' , [
            'auth' => auth()->check(),
            'data' => [
                'menu' => $getDataMenu->replyMenu()
            ]
        ]);
    }

    public function view_menu(Request $request)
    {
        $data = SunMenu::whereMenu_id($request->id)->get();
        return response()->json($data);
    }
}
