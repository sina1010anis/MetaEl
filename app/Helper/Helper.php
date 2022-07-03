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
