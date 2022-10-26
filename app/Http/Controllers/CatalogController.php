<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function catalog(){
        session()->put('test', 'ololo');
        session()->push('test', 'dmfngtjudk');
        dump(session()->all());
    }
}
