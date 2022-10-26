<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function __invoke($category, $product){
        $product = Product::find($product);

        $product->price /= 100;

        if(!$product->active || $product->category->id != $category){
            return 'The product is not active or the address is wrong.'; // в идеале должна быть вьюшка 404
        }
        return view('site.product', compact('product'));
    }
}
