<?php

namespace App\Repository\Front\Admin;

use App\Models\Images;
use App\Models\Product;
use App\Repository\Front\Admin\Geter\BindDataPanel;

trait ProductAdminRepository{

    use BindDataPanel;

    public function delete_image_product(Images $id)
    {
        $id->delete();
        return redirect()->back()->with(['msg' => 'عکس مورد نظر حذف شد.']) ;
    }
}

?>