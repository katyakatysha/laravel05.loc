<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart(){
        $cart = session()->get('cart', []);
        $product_ids = array_keys($cart);
        $products = Product::query()->whereIn('id', $product_ids)->get()->keyBy('id');
        dd($products);
    }

    public function addToCart(Request $request){
        $cart = session()->get('cart', []);
        $product_id = $request->input('product');

        if (isset($cart[$product_id])){
            $cart[$product_id]++;
        }else{
            $cart[$product_id] = 1;
        }

    }
}
