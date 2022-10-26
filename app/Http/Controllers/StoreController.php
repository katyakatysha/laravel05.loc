<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CurrencyService;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __construct(){
//        $this->service = $service;
    }

    public function __invoke(Request $request)
    {
        $products = Product::query()->where('active', 1)->limit(9)->with('category')
            ->get();
        $categories = Category::withCount('products')->get();
        return view('site.store', compact(['products', 'categories']));
    }
}
