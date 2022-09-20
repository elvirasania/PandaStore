<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('index',compact('products'));
    }

    public function detail($id){
        $products = product::where('id', $id)->first(); 
        return view('detail',compact('products'));
    }
}
