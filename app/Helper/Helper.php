<?php
function data_history(Array $data){
    $data_history = $data;
    return $data_history;
}
function history_search($type = true){
    $securityUserHistorySearch = new App\Repository\Front\User\SecurityUserHistorySearch;
    $cookie = new Illuminate\Support\Facades\Cookie;
    $product = new App\Models\Product;
    if($type){
        try {
            $history_search= $securityUserHistorySearch->get_old_data($cookie::get('CODE_SEARCH'))->show_data();
            return $product::whereIn('id' , $history_search)->get();
        }catch (\Exception $e){
            return 'Error';
        }
    }else{
        try {
            $history_search= $securityUserHistorySearch->get_old_data($cookie::get('CODE_SEARCH'))->show_data();
            return $product::whereIn('id' , $history_search)->count();
        }catch (\Exception $e){
            return 'Error';
        }
    }
}
function history_product(){
    $securityUserHistorySearch = new App\Repository\Front\User\SecurityUserHistorySearch;
    $cookie = new Illuminate\Support\Facades\Cookie;
    $product = new App\Models\Product;
    try {
        $history_search= collect($securityUserHistorySearch->get_old_data($cookie::get('CODE_SEARCH'))->show_data())->last();
        $data = $product::find($history_search);
        return $product::where('sub_menu_id' , $data->sub_menu_id)->get();
    }catch (\Exception $e){
        return 'Error';
    }
}
function get_total_price_discount($code){
    $mode_dis = new App\Models\DiscountCode();
    if(auth()->check()){
        $data_discount = $mode_dis::where(['code' => $code , 'status' => 1 , 'user_id' => auth()->user()->id , 'score' => 0]);
        if($data_discount->count() == 1){
            return $data_discount->first();
        }else{
            $data_discount_all = $mode_dis::where(['code' => $code , 'status' => 1 , 'user_id' => 0]);
            if($data_discount_all->count() == 1){
                return $data_discount_all->first();
            }else{
                return 'Code Not Find';
            }
        }
    }
}
