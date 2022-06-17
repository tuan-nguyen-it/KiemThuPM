<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
   
    use HasFactory; 
    public $timestamps = FALSE;
    protected $table = 'accounts';
    protected $fillable = ['name', 'password', 'role'];


    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        } 
        return $query;
    }
}
