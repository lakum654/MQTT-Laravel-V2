<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('front.pages.welcome');
    }

    public function products()
    {
        return view('front.pages.products');
    }
}
