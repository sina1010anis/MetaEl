<?php

namespace App\Repository\Front\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repository\Front\Admin\Geter\Update;
use App\Repository\Front\Admin\Geter\BindDataPanel;

trait AdminRepository {

    use Update;

    public function show_item(String $model)
    {
        $data =(new $model)::paginate(10);
        return view('Admin.Pages.Product' , compact('data' , 'model'));
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
    public function delete_data($model , $id)
    {
        $this
        ->set_class($model)
        ->set_data(['id' => $id])
        ->cls_data();
        return redirect()->back()->with(['msg'=>'ایتم مورد نظر حذف شد']);
    }
    public function edit_data($model , $id)
    {
        $data = $this
        ->set_class($model)
        ->set_data(['id'=>$id])
        ->get_data();
        return view('Admin.Pages.EditItem' , ['data' => $data[0] , 'model' =>$model]);
    }
    public function edit_data_post($model , $id , Request $request)
    {
        $this
        ->set_class($model)
        ->set_data(['id' => $id])
        ->update(collect($request)->prepend(Str::slug($request->name) , 'slug')->forget('_token')->all());
        return redirect()->back()->with(['msg'=>'مقدار مورد نظر ویرایش شد']);
    }
}