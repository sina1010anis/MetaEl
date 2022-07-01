<?php
function data_history(Array $data){
    $data_history = $data;
    return $data_history;
}
function history_search(){
    $securityUserHistorySearch = new App\Repository\Front\User\SecurityUserHistorySearch;
    $cookie = new Illuminate\Support\Facades\Cookie;
    $product = new App\Models\Product;
    try {
        $history_search= $securityUserHistorySearch->get_old_data($cookie::get('CODE_SEARCH'))->show_data();
        return $product::whereIn('id' , $history_search)->get();
    }catch (\Exception $e){
        return 'Error';
    }
}
