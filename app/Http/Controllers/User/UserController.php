<?php

namespace App\Http\Controllers\User;

use Exception;
use App\Models\Cart;
use App\Models\Item;
use App\Models\Menu;
use App\Models\News;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Banner;
use App\Models\factor;
use App\Models\Slider;
use App\Models\Address;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ReturnProduct;
use App\Models\CommentProduct;
use App\Models\product_factor;
use App\Http\Resources\ReturnP;
use App\Models\ReturnProductItem;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResources;
use App\Repository\Front\QueryDatabase;
use App\Http\Resources\AddressCollection;
use App\Http\Resources\CommentCollection;
use App\Repository\Front\User\UserRepository;
use App\Http\Resources\ProductFactorCollection;
use App\Http\Resources\ReturnProductCollection;
use App\Repository\Front\Data\CountItemDataBase;

class UserController extends Controller
{
    use QueryDatabase , UserRepository;
    //The [call_back_profile , buy_product] is inside the UserRepository : The desired method is written as a trait

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
                    'status' => 'index'
                ]
            ]);
        }else{
            return Inertia::render('User/HomeLoginAndRegister');
        }
    }
    public function product_factor(Request $request)
    {
        $data = product_factor::whereFactorId($request->id)->get();
        return new ProductFactorCollection($data);
    }
    public function delete_address(Request $request , Address $address , User $user)
    {
        $count = $this->getCount($user , ['id' => auth()->user()->id , 'address_id' => $request->id]);
        if($count == 0){
            $this->delete($address , ['id' => $request->id]);
        }else{
            return abort(404);
        }
    }
    public function show_profile()
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
                    'status' => 'profile',
                    'data_user' =>auth()->user()
                ]
            ]);
        }else{
            return Inertia::render('User/HomeLoginAndRegister');
        }
    }
    public function product_return()
    {
        if (auth()->check()){
            $data_product_return = new ReturnP(ReturnProduct::where(['user_id' => auth()->user()->id])->where('status' , '>' , 0)->get());
            return Inertia::render('User/ProfileIndexVue' , [
                'auth' => auth()->check(),
                'data' =>[
                    'time' => jdate()->format('%A, %d %B %y'),
                    'factor' => factor::whereUser_id(auth()->user()->id)->orderBy('id' , 'DESC')->get(),
                    'comment' => new CommentCollection(CommentProduct::whereUserId(auth()->user()->id)->orderBy('id' , 'DESC')->get()),
                    'address' => new AddressCollection(Address::whereUserId(auth()->user()->id)->orderBy('id' , 'DESC')->get()),
                    'news' => News::orderBy('id' , 'DESC')->get(),
                    'status' => 'product_return',
                    'data_user' =>auth()->user(),
                    'list_return_product' => $data_product_return
                ]
            ]);
        }else{
            return Inertia::render('User/HomeLoginAndRegister');
        }
    }
    public function send_product_return(Request $request , ReturnProduct $returnProduct , ReturnProductItem $returnProductItem)
    {
        $count = $this->getCount($returnProduct , ['user_id' => auth()->user()->id , 'code' => $request->code , 'status' => 0]);
        if($count == 1){
            $data_code = ReturnProduct::where(['user_id' => auth()->user()->id , 'code' => $request->code  , 'status' => 0])->first() ;
            $product_return = ReturnProductItem::whereReturnProductId($data_code->id)->get() ;
            $resource_product_return = new ReturnProductCollection($product_return);
            return ['data'=>$resource_product_return , 'id' => $data_code->id];
        }else{
            return abort(404);
        }
    }
    public function send_edit_product_return(Request $request , ReturnProduct $returnProduct)
    {
        $count = $this->getCount($returnProduct , ['id' => $request->id , 'status'=> 0]);
        if($count == 1){
            $this->update($returnProduct , ['id' => $request->id] , ['status' => 1]);
            return 'Ok';
        }else{
            return abort(404);
        }
    }
    public function profile_cart()
    {
        $data_cart = (auth()->check()) ?new CartResources(Cart::where(['user_id' => auth()->user()->id , 'status' => 0])->get()) : ''; 
        $count_cart = (auth()->check()) ? Cart::where(['user_id' => auth()->user()->id , 'status' => 0])->count() : ''; 
        $price = [
            'number_product' => $this->number_cart(),
            'price_product' => $this->total_price(),
            'price_send' => $this->send_price(),
            'total_price' => $this->total_price() + $this->send_price()
        ];
        if (auth()->check()){
            return Inertia::render('User/ProfileIndexVue' , [
                'auth' => auth()->check(),
                'data' =>[
                    'time' => jdate()->format('%A, %d %B %y'),
                    'status' => 'cart',
                    'data_user' =>auth()->user(),
                    'count_cart' => $count_cart,
                    'data_cart' => $data_cart,
                    'price' => $price
                ]
            ]);
        }else{
            return Inertia::render('User/HomeLoginAndRegister');
        }
    }
}
