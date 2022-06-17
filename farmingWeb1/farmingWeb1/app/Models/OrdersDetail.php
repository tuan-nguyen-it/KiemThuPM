<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "orders_detail";
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price']; 

    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        } 
        return $query;
    }
}
