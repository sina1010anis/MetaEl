<?php

namespace App\Repository\Front\Product;

use App\Models\Cart;
use App\Models\filter_product;
use App\Models\PriceProduct;
use App\Models\Product;
use App\Models\SaveProduct;
use Illuminate\Http\Request;
use App\Repository\Front\Data\Created;
use App\Repository\Front\QueryDatabase;
use App\Repository\Front\Data\CountItemDataBase;



trait ProductRepository
{

    use QueryDatabase , Created , CountItemDataBase;

    public function save_product(Request $request , SaveProduct $saveProduct){
        if($this->getCount($saveProduct , ['user_id'=>auth()->user()->id , 'product_id'=> $request->id]) == 1){
            return abort(404);
        }else{
            $this->create($saveProduct , $this->data_save_product($request->id));
            return 'ok';
        }
    }

    public function set_cart(Request $request , Cart $cart , Product $product){
        $data_product = Product::where(['id'=>$request->id_product]);
        $data_size = PriceProduct::where(['id'=>$request->id_size])->count();
        $data_cart = Cart::where(['user_id' => auth()->user()->id , 'product_id' => $request->id_size]);
        $data_S = PriceProduct::whereId($request->id_size)->first();
        if($data_product->count() == 1 and $data_size == 1){
             if($data_cart->count() == 1){
                 $data_cart->first()->increment('number', 1);
                 $data_cart->first()->increment('total_price',$data_S->price );
             }else{
                 return $data_S;
                 $this->create($cart ,$this->data_set_cart($data_S));
             }
        }else{
            return abort(404);
        }
    }

    public function delete_product(Request $request  , Cart $cart){
        if(auth()->check()){
            $this->delete($cart , ['id'=> $request->id]);
        }else{
            return false;
        }
    }

    public function sort_product(Request $request){
        switch($request->model){
            case 'new':
                return Product::whereSub_menu_id($request->id)->orderBy('id' , 'DESC')->get();
                break;
            case 'expensive':
                return Product::whereSub_menu_id($request->id)->orderBy('price' , 'DESC')->get();
                break;
            case 'inexpensive':
                return Product::whereSub_menu_id($request->id)->orderBy('price' , 'ASC')->get();
                break;
        }
            
    }
    
    public function filter_product(Request $request){
        $id_product = [];
        $data = collect(filter_product::whereIn('filter_id' , $request->id)->get('product_id'))->unique();
        foreach($data as $i){
            $id_product[] = $i->product_id;
        }
        $product = Product::whereIn('id' , $id_product)->get();
        return ($product->count() > 0) ? $product : 'null';
    }

}
