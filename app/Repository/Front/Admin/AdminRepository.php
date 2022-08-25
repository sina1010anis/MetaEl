<?php

namespace App\Repository\Front\Admin;

use App\Models\filter_product;
use App\Models\Product;
use App\Models\title_filter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repository\Front\Admin\Geter\Update;
use App\Repository\Front\Admin\Geter\BindDataPanel;
use App\Repository\Front\Admin\Geter\UploadImageProduct;

use function PHPUnit\Framework\isNull;

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
        }if($model == '\App\Models\Item'){
            $file = ($request->file('image')) ? $this->set_file('image',$request)->set_name() : null;
            $data = ($request->file('image')) ? collect($request)->prepend($file->get_name() , 'image')->forget('_token')->all() : collect($request)->forget('_token')->all() ;
            ($request->file('image')) ? $file->move_file('\image\front\/') : null;
        }else{
            $data = collect($request)->forget('_token')->all();
        }
        dd($data);
        $this
        ->set_class($model)
        ->set_data(['id' => $id])
        ->update($data);
        return redirect()->back()->with(['msg'=>'مقدار مورد نظر ویرایش شد']);
    }

    public function new_data_post($model , $type , Request $request)
    {
        $file = ($type != 'null') ? $this->set_file('image' , $request)->set_name() : null;
        $this
        ->set_class($model)
        ->create( ($type != 'null') ? $this->create_image($request , $file->get_name() , $model) : $this->create_not_image($request) );
        ($type != 'null') ?$file->move_file($type) : null;
    }

    public function edit_datail_product($model , $id , $id_datail_product , Request $request)
    {
        $request = collect($request)->forget('_token');
        if($id_datail_product == 'Null'){
            $this
            ->set_class($model)
            ->create($request->prepend($id , 'product_id')->all());
        }else{
            $this
            ->set_class($model)
            ->set_data(['id' =>$id])
            ->update($request->all());
        }
        return redirect()->back()->with(['msg'=>'عملیات انجام شد']);
    }
    public function edit_filter_product($model ,$id , Request $request)
    {
        $data = collect($request)->forget('_token')->all();
        if($data)
        {
            foreach($data as $key => $val)
            {
                filter_product::whereId($key)->update(['filter_id' => $val]);
            }
            return redirect()->back()->with(['msg'=>'عملیات ویرایش انجام شد']);
        }else{
            $menu_id = (Product::whereId($id)->first())->sub_menu->b_menu_id;
            foreach(title_filter::where('b_menu_id' , $menu_id)->get() as $filter)
            {
                filter_product::create([
                    'product_id' => $id,
                    'title_filter_id' => $filter->id,
                    'filter_id' => 0
                ]);
            }
            return redirect()->back()->with(['msg'=>'فیلتر های مورد نظر ساخته شد']);
        }

        
    }
    protected function create_image(Request $request , $name_image , $model)
    {
        return ($model == '\App\Models\Product') 
        ? collect($request)->prepend(Str::slug($request->name) , 'slug')->prepend($name_image , 'image')->forget('_token')->all() 
        : collect($request)->prepend($name_image , 'image')->forget('_token')->all() ;
    }
    
    protected function create_not_image(Request $request)
    {
        return collect($request)->forget('_token')->all();
    }
}