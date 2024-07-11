<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['clients'] = Client::get();
        $data['galleries'] = Gallery::get();
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

    public function blog() {
        $data['blogs'] = Blog::with('category')->paginate(5);
        $data['categories'] = Category::get();
        $data['recent_blogs'] = Blog::orderBy('id','desc')->limit(5)->get();
        $data['is_active_category'] = "";
        return view('front.pages.blog',$data);
    }

    public function blogShow($slug) {
        $data['blog'] = Blog::where('slug',$slug)->first();
        $data['categories'] = Category::get();
        $data['recent_blogs'] = Blog::where('id','!=',$data['blog']->id)->orderBy('id','desc')->limit(5)->get();
        return view('front.pages.blog_show',$data);
    }

    public function blogCategory($category)
    {
        $data['blogs'] = Blog::where('category_id',$category)->paginate(5);
        $data['categories'] = Category::get();
        $data['is_active_category'] = Category::find($category)->id;
        $data['recent_blogs'] = Blog::orderBy('id','desc')->limit(5)->get();
        return view('front.pages.blog',$data);
    }
}
