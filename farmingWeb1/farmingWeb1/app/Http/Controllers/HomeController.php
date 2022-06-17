<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();

        return view('home', compact('cat'));
    }

    public function shop() {
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        $products = Product::orderBy('created_at','DESC')->search()->paginate(15);
        return view('shop', compact('cat'), compact('products'));
    }

    public function detail($product){
        $data = Product::find($product);
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        return view('shop_details', compact('cat'), compact('data'));
    }

    public function blog_detail($id){
        $blog_detail = Blog::find($id);
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        return view('blog_details', compact('cat'), compact('blog_detail'));   
    }
}
