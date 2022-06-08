<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return $product;
    }
    public function search(Request $request)
    {
        return Product::where('name' , 'LIKE' , '%'.$request->data.'%')->get();
    }
}
