<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['clients'] = Client::get();
        return view('front.pages.welcome',$data);
    }

    public function products()
    {
        $products = Product::get();
        $data['products'] = $products;
        return view('front.pages.products',$data);
    }

    public function services()
    {
        $services = Service::get();
        $data['services'] = $services;
        return view('front.pages.services',$data);
    }

    public function productShow($id)
    {
        $product = Product::find($id);
        $data['product'] = $product;
        return view('front.pages.product_show',$data);
    }

    public function serviceShow($id)
    {
        $service = Service::find($id);
        $data['product'] = $service;
        return view('front.pages.service_show',$data);
    }

    public function whyChooseUs() {
        return view('front.pages.why_choose_us');
    }
}
