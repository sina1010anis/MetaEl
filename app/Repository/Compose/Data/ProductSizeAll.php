<?php

namespace App\Repository\Compose\Data;

use App\Models\PriceProduct;
use Illuminate\View\View;

class ProductSizeAll{

    public function compose(View $view)
    {
        return $view->with('product_size_all' , PriceProduct::all());
    }

}

?>