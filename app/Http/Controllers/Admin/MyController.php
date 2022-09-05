<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index()
    {
        $arr = [
            'h1'=>'Hello Igor',
            'h2'=>'Hello Kate'
        ];
        return view('admin.dashboard');
    }
}
