<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'description', 'price', 'stock', 'rating', 'image'];

    public function detailProduct($id)
    {
        return DB::table('products')->where('id',$id)->first();
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cart(){
        return $this->belongsToMany(Category::class);
    }
}
