<?php

namespace App\Repository\Front\Admin;

use App\Http\Requests\ImageProductRequest;
use App\Models\Images;
use App\Repository\Front\Admin\Geter\Created;
use App\Repository\Front\Admin\Geter\UploadImageProduct;
use Illuminate\Http\Request;

trait ProductAdminRepository{

    use Created , UploadImageProduct;

    public function delete_image_product(Images $id)
    {
        $id->delete();
        return redirect()->back()->with(['msg' => 'عکس مورد نظر حذف شد.']) ;
    }
    public function product_image_upload($id , ImageProductRequest $request)
    {
        $file = $this->set_file('image' , $request);
        $file->move_file();
        return $this->set_class('App\Models\Images')->create(['name' => $file->get_name() , 'image' => $file->get_name() , 'product_id' => $id])->back('msg' , 'عکس جدید اضافه شد.');
    }
}

?>