<?php

namespace App\Http\Controllers;

use App\Models\CartHelpers;
use App\Models\Category;
use App\Models\Product;


class CartController extends Controller{

    public function view(){
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        return view('shop_cart', compact('cat'));
    }

    public function add(CartHelpers $cart,  $id, $user){
        $product = Product::find($id);
        $cart->add($product, $user);
        return redirect()->route('view');

    }

    public function remove(CartHelpers $cart, $id){
       $cart->remove($id);
       return redirect()->back();
    }
    public function update(CartHelpers $cart, $id){
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    public function clear(CartHelpers $cart, $id){
        
    }
}
