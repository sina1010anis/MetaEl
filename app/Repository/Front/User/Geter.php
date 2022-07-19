<?php
namespace App\Repository\Front\User;

use App\Models\factor;

abstract class Geter{
    public function get_code_factor(){
        return (auth()->check()) ? factor::whereUser_id(auth()->user()->id)->orderBy('id' , 'DESC')->first('code_pay') : abort(404);
    }
}

?>