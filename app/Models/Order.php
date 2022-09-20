<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'order_date', 'total', 'status'];
    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
