<?php

namespace App\Repository\Front\Admin;

use App\Models\Product;
use Illuminate\Http\Request;

trait ProductAdminRepository{

    public function show_product()
    {
        $data = Product::paginate(10);
        return view('Admin.Pages.Product' , compact('data'));
    }
    public function search_product($model , Request $request)
    {
        $class = new $model;
        $data = $class->where('name' , 'LIKE' , '%'.$request->text_search.'%')->get();
        return redirect()->back()->with(['data_search' => $data]);

    }

}