<?php

namespace App\Repository\Compose\Data;

use App\Models\Product;
use Illuminate\View\View;

class ProductAll{

    public function compose(View $view)
    {
        return $view->with('product_all' , Product::all());
    }

}

?>