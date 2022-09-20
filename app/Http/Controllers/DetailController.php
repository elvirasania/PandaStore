<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    // public function __construct()
    // {
    //     $this->Product = new Product();
    //     $this->middleware('auth');
    // }

    // public function index($id)
    // {
    //     $Products = product::where('id', $id)->first(); 
    //     return view('detail',compact('Products'));
    // }
    // public function order(Request $request, $id)
    // {
    //     $Products = product::where('id', $id)->first();
    //     $order_date = Carbon::now();

    //     if($request->jumlah_pesan > $Products->stok)
    //     {
    //          return redirect('pesan/'.$id);
    //     }

    //     $validasi_order = Order::where('user_id', Auth::user()->id)->where('status','unpaid')->first(); 
        
    //     //simpan ke order
    //     if(empty($validasi_order))
    //     {
    //         $order = new Order;
    //         $order->user_id = Auth::user()->id;
    //         $order->order_date = $order_date;
    //         $order->total = 0;
    //         $order->status = 'unpaid';
    //         $order->save();
    //     }
        
    //     //simpan ke orderdetails
    //     $new_order = Order::where('user_id', Auth::user()->id)->where('status','unpaid')->first(); 
        
    //     $validasi_order_detail = OrderDetail::where('product_id', $Products->id)->where('order_id',$new_order->id)->first(); 
    //     if(empty($validasi_order_detail))
    //     {
    //         $order_detail = new OrderDetail;
    //         $order_detail->product_id = $Products->id;
    //         $order_detail->order_id = $new_order->id;
    //         $order_detail->price = $Products->price;
    //         $order_detail->qty = $request->jumlah_pesan;
    //         $order_detail->subtotal = $Products->price *$request->jumlah_pesan;
    //         $order_detail->save();
    //     }else{
    //         $order_detail = OrderDetail::where('product_id', $Products->id)->where('order_id',$new_order->id)->first();
    //         $order_detail->qty = $order_detail->qty*$request->jumlah_pesan;
            
    //         $new_price_order_detail = $Products->price*$request->jumlah_pesan;
    //         $order_detail->subtotal = $order_detail->subtotal*$new_price_order_detail;
    //         $order_detail = update();
    //     }
    //     $order = Order::where('user_id', Auth::user()->id)->where('status','unpaid')->first(); 
    //     $order->total = $order->total+$Products->price*$request->jumlah_pesan;
    //     $order->update();
        
    //     return redirect('index');
    // }
    
    // public function checkout()
    // {
    //     $order = Order::where('user_id', Auth::user()->id)->where('status','unpaid')->first(); 
    //     $order_details = OrderDetail::where('product_id', $order->id)->get();

    //     return view('checkout',compact('order','order_deatils'));
        
    // }
    // public function delete($id)
    // {
    //     $order_details = OrderDetail::where('id', $id)->first();

    //     $order = Order::where('id', $order->order_id)->first(); 
    //     $order->total = $order->total-$order->total; 
    //     $order->update(); 

    //     $order->delete();
    // }
    
}