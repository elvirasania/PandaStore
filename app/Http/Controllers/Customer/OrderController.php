<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::with('user')->where('user_id', auth()->user()->id)->get();
        // dd($orders);
        return view('order', compact('orders'));
    }

    public function store(Request $request){
        $request->validate([
            'total' => 'required',
        ]);

        $orderid = 'INV'.time();

        Order::create([
            'id' => $orderid,
            'user_id' => auth()->user()->id,
            'order_date' => Carbon::now(),
            'total' => $request->total,
            'status' => 'unpaid',
        ]);

        $carts = Cart::where('user_id', auth()->user()->id)->get();
        
        foreach($carts as $cart){
            OrderDetail::create([
                'order_id' => $orderid,
                'product_id' => $cart->product_id,
                'price' => $cart->price,
                'qty'   => $cart->qty,
                'subtotal' => $cart->subtotal
            ]);
        }

        $carts = Cart::where('user_id', auth()->user()->id)->delete();
        
        return redirect('/order
        ')->with('success', 'Terima kasih telah membeli di toko kami');
    }

    public function detail($id){
        $order_detail = OrderDetail::with('order')->with('product')->where('order_id', $id)->get();
    
        return view('order_detail', compact('order_detail'));
    }

    public function cetak_pdf()
    {
        $orders_detail = OrderDetail::all();
        $pdf = PDF::loadview('print_pdf',compact('orders_detail'));
        return $pdf->stream();
    }

}
