<?php 

namespace App\Repository\Front\User;

use App\Models\Cart;

trait GetNumber{
    public function number_cart()
    {
        return (auth()->check()) ? Cart::where(['user_id' => auth()->user()->id , 'status' => 0])->sum('number') : abort(404);
    }
}


?>