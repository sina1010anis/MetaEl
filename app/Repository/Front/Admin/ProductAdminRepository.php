<?php

namespace App\Repository\Front\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Repository\Front\Admin\Geter\BindDataPanel;
trait ProductAdminRepository {

    use BindDataPanel;

    public function show_product()
    {
        $data = Product::paginate(10);
        return view('Admin.Pages.Product' , compact('data'));
    }
    public function search_product($model , Request $request)
    {
        $data = $this
        ->set_class($model)
        ->set_data(null , 'name' , 'LIKE' , '%'.$request->text_search.'%' , false)
        ->get_data();
        return redirect()->back()->with(['data_search' => $data]);

    }
    public function show_data($model , $id)
    {
        $data = $this
        ->set_class($model)
        ->set_data(['id'=>$id])
        ->get_data();
        return view('Admin.Pages.ShowItem' , ['data' => $data[0]]);
    }

}