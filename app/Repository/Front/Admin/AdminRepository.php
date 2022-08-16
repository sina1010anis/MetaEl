<?php

namespace App\Repository\Front\Admin;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repository\Front\Admin\Geter\Update;
use App\Repository\Front\Admin\Geter\BindDataPanel;
use App\Repository\Front\Admin\Geter\UploadImageProduct;

trait AdminRepository {

    use Update , UploadImageProduct;

    public function show_item(String $model)
    {
        $data =(new $model)::orderBy('id' , 'DESC')->paginate(10);
        return view('Admin.Pages.Product' , compact('data' , 'model'));
    }

    public function new_data($model)
    {
        return view('Admin.Pages.NewItem' , compact('model'));
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
        return view('Admin.Pages.ShowItem' , ['data' => $data[0] , 'model' =>$model]);
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
        if($model == '\App\Modles\Product'){
            $data = collect($request)->prepend(Str::slug($request->name) , 'slug')->forget('_token')->all();
        }else{
            $data = collect($request)->forget('_token')->all();
        }
        $this
        ->set_class($model)
        ->set_data(['id' => $id])
        ->update($data);
        return redirect()->back()->with(['msg'=>'مقدار مورد نظر ویرایش شد']);
    }

    public function new_data_post($model , Request $request)
    {
        $file = ($model == '\App\Models\Product') ? $this->set_file('image' , $request)->set_name() : null;
        $this
        ->set_class($model)
        ->create( ($model == '\App\Models\Product') ? $this->create_image($request , $file->get_name()) : $this->create_not_image($request) );
        ($model == '\App\Models\Product') ?$file->move_file() : null;
    }

    protected function create_image(Request $request , $name_image)
    {
        return collect($request)->prepend(Str::slug($request->name) , 'slug')->prepend($name_image , 'image')->forget('_token')->all();
    }
    
    protected function create_not_image(Request $request)
    {
        return collect($request)->forget('_token')->all();
    }
}