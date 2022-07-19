<?php 

namespace App\Repository\Front\User;

use App\Models\Cart;
use App\Models\Address;

trait GetTotalPrice{

    public function total_price()
    {
        return (auth()->check()) ? Cart::where(['user_id' => auth()->user()->id , 'status' => 0])->sum('total_price') : abort(404);
    }

    public function send_price()
    {
        return (auth()->check()) ? (Address::whereId(auth()->user()->address_id)->first())->city->send_price : abort(404);
    }
    public function sum(){
        return $this->total_price() + $this->send_price();
    }

}

?>