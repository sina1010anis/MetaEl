<?php

namespace App\Http\Controllers\Front;

use App\Models\Cart;
use App\Models\Menu;
use Inertia\Inertia;
use App\Models\Images;
use App\Models\Product;
use App\Models\SunMenu;
use App\Models\SaveProduct;
use App\Models\PriceProduct;
use App\Models\title_filter;
use Illuminate\Http\Request;
use App\Models\DatailProduct;
use App\Models\CommentProduct;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResources;
use App\Http\Resources\FilterResource;
use Illuminate\Support\Facades\Cookie;
use App\Repository\Front\QueryDatabase;
use App\Http\Resources\CommentCollection;
use App\Repository\Front\Data\CountItemDataBase;
use App\Repository\Front\Product\ProductRepository;
use App\Repository\Front\User\SecurityUserHistorySearch;
use App\Repository\Front\Comment\CommentProduct as CommentProductTrait;

class ProductController extends Controller
{
    use CommentProductTrait , CountItemDataBase , ProductRepository , QueryDatabase;
    //The [comment_new method , reply_comment_new ] is inside the CommentProductTrait : The desired method is written as a trait
    //The [save_product , set_cart , delete_product , sort_product , filter_product , get_product_comparison] is inside the ProductRepository : The desired method is written as a trait
    public function show(Product $product , SaveProduct $saveProduct , SecurityUserHistorySearch $securityUserHistorySearch)
    {
        $data_cart = (auth()->check()) ? new CartResources(Cart::whereUser_id(auth()->user()->id)->whereStatus(0)->get()) : '';
        $toal_price_all = (auth()->check()) ? Cart::whereUser_id(auth()->user()->id)->whereStatus(0)->sum('total_price'): '';
        $toal_count_all = (auth()->check()) ? Cart::whereUser_id(auth()->user()->id)->whereStatus(0)->sum('number'): '';
        (Cookie::has('CODE_SEARCH')) ? $securityUserHistorySearch->get_old_data(Cookie::get('CODE_SEARCH'))->set_new_data($product->id)->put_file() : 'Error';
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
                'save_product' =>$status_save,
                'data_cart' => $data_cart,
                'total_price' =>  $toal_price_all,
                'total_count' =>  $toal_count_all,
                'history_search' => history_search(),
                'status_history_product' => history_search(false),
                'history_product' => history_product()
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
    public function show_menu(SunMenu $menu , Product $product){
        $data_cart = (auth()->check()) ? new CartResources(Cart::whereUser_id(auth()->user()->id)->get()) : '';
        $toal_price_all = (auth()->check()) ? Cart::whereUser_id(auth()->user()->id)->sum('total_price'): '';
        $toal_count_all = (auth()->check()) ? Cart::whereUser_id(auth()->user()->id)->sum('number'): '';
        return Inertia::render('Product/MenuVue', [
            'auth' => auth()->check(),
            'data' => [
                'menu' => Menu::whereStatus(1)->get(),
                'menu_on' => $menu,
                'product' => $product::whereSub_menu_id($menu->id)->get(),
                'history_search' => history_search(),
                'data_cart' => $data_cart,
                'filter' => new FilterResource(title_filter::whereMenuId($menu->menu->id)->get()),
                'total_price' =>  $toal_price_all,
                'total_count' =>  $toal_count_all,
                ]
        ]);
    }
}
