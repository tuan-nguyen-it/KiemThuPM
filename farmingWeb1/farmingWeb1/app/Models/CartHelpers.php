<?php

namespace App\Models;

class CartHelpers {
    public $items = [];
    public $total_price_sale = 0;
    public $total_quantity = 0;
    public $total_price = 0;


    public function __construct()
    {
        $this->items = session('shop_cartsss') ? session('shop_cartsss') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
        $this->total_price_sale = $this->get_total_price_sale();
    }

    public function add($product, $user, $quantity = 1){
        $new = [
            'id' => $product->id,
            'user'=> $user,
            'name' => $product->name,
            'price' => $product->price ? $product -> price : $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
            'sale' => $product->sale_price,
        ];
        $bool = true;
        foreach($this->items as $item){
            if($item['id'] == $product->id)/*&& strcmp($item['user'], $user) == 0)*/{
                $this->items[$product->id]['quantity'] += $quantity;
                $bool = false;
            }
        }

        
        if($bool == true){
            $this->items[$product->id] = $new;
        }
        session(['shop_cartsss' => $this->items]);
    }

    public function remove($id){
        if(isset($this->items[$id])){
            unset($this->items[$id]);
        }
        session(['shop_cartsss' => $this->items]);
    }

    public function update($id, $quantity ){
        if(isset($this->items[$id])){
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['shop_cartsss' => $this->items]);
    }

    public function clear(){
        session(['shop_cartss' => '']);
    }

    private function get_total_price(){
        $t = 0;
        foreach($this->items as $item){
            $t += $item['price'] * $item['quantity'];
        }
        return $t;
    }

    private function get_total_quantity(){
        $t = 0;
        foreach($this->items as $item){
            $t += $item['quantity'];
        }
        return $t;
    }

    private function get_total_price_sale(){
        $t = 0;
        foreach($this->items as $item){
            $t += $item['quantity'] * ($item['price'] - $item['price'] * $item['sale']);
        }
        return $t;
    }
}

?>