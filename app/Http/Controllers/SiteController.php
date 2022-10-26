<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __invoke()
    {
        //select * from products where active = 1 and category_id = 1 order by id desc
        $latestProducts = Product::query()->where('active', 1)->limit(10)->latest()->get();

        return view ('site.index', compact('latestProducts'));
    }
}
