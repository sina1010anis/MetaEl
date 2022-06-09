<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\DatailProduct;
use App\Models\Images;
use App\Models\Menu;
use App\Models\PriceProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return Inertia::render('Product/ShowProductVue', [
            'auth' => auth()->check(),
            'data' => [
                'menu' => Menu::whereStatus(1)->get(),
                'product' => $product,
                'image_product' => Images::whereProduct_id($product->id)->get(),
                'menu_s' => $product->sub_menu,
                'menu_a' => $product->sub_menu->menu,
                'datail' => DatailProduct::whereProduct_id($product->id)->first(),
                'price_product' => PriceProduct::whereProduct_id($product->id)->get(),
                ]
        ]);
    }

    public function search(Request $request)
    {
        return Product::where('name', 'LIKE', '%' . $request->data . '%')->get();
    }
    public function set_price(Request $request)
    {
        return PriceProduct::whereId($request->id)->first();
    }
}
