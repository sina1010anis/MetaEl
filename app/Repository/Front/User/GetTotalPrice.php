<?php 

namespace App\Repository\Front\User;

use App\Models\Cart;
use App\Models\Address;
use App\Models\DiscountCode;
use App\Repository\Front\QueryDatabase;

trait GetTotalPrice{

    use QueryDatabase;

    public function total_price()
    {
        return (auth()->check()) ? Cart::where(['user_id' => auth()->user()->id , 'status' => 0])->sum('total_price') : abort(404);
    }

    public function total_price_discount($code)
    {
        if(get_total_price_discount($code) != 'Code Not Find'){
            $value_discount = get_total_price_discount($code)->value;
            return $this->total_price() - ($this->total_price() / (100 / $value_discount));
        }else{
            return $this->total_price();
        }
    }

    public function send_price()
    {
        return (auth()->check()) ? (Address::whereId(auth()->user()->address_id)->first())->city->send_price : abort(404);
    }

    public function sum($code = null){
        return ($code == null) ? $this->total_price() + $this->send_price() : $this->total_price_discount($code) + $this->send_price() ;
    }

}

?>