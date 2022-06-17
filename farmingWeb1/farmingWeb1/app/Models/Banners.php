<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "banner";
    protected $fillable = ['name', 'image', 'link', 'description', 'status', 'prioty'];
    
    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        } 
        return $query;
    }
}
