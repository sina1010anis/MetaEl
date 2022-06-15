<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentCollection;
use App\Models\CommentProduct;
use App\Models\DatailProduct;
use App\Models\Images;
use App\Models\Menu;
use App\Models\PriceProduct;
use App\Models\Product;
use App\Models\SaveProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Repository\Front\Comment\CommentProduct as CommentProductTrait;
use App\Repository\Front\Data\CountItemDataBase;

class ProductController extends Controller
{
    use CommentProductTrait , CountItemDataBase;
    //The comment_new method is inside the CommentProductTrait : The desired method is written as a trait
    //The reply_comment_new method is inside the CommentProductTrait : The desired method is written as a trait
    //The save_product method is inside the CommentProductTrait : The desired method is written as a trait
    public function show(Product $product , SaveProduct $saveProduct)
    {
        $status_save = (auth()->check()) 
        ? $this->getCount($saveProduct , ['user_id' => auth()->user()->id , 'product_id' => $product->id]) 
        : false ;
        return Inertia::render('Product/ShowProductVue', [
            'auth' => auth()->check(),
            'data' => [
                'menu' => Menu::whereStatus(1)->get(),
                'product' => $product,
                'image_product' =>$product->images,
                'menu_s' => $product->sub_menu,
                'menu_a' => $product->sub_menu->menu,
                'datail' => $product->datail_product,
                'price_product' => $product->price_product,
                'related_product' => Product::whereSub_menu_id($product->sub_menu_id)->take(8)->get(),
                'comment_product' => collect(new CommentCollection($product->comment_product))->sortByDesc('id'),
                'count_comment' => $product->comment_product->count(),
                'csrf' => csrf_token(),
                'save_product' =>$status_save
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
