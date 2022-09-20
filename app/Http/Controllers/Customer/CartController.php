<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $total = Cart::with('product')->where('user_id', auth()->user()->id)->sum('subtotal');
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        return view('cart', compact('carts', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('OK');
        $request->validate([
            'product_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);

        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'subtotal' => $request->price * $request->qty,
        ]);

        return redirect('/cart')->with('success', 'Data berhasil ditambahkan!');
    }

    public static function count_cart($id){
        $count = Cart::with('product')->where('user_id', auth()->user()->id)->count();
        return $count;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Cart::where('id', $id)->first();
        return view('customer.categories.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd('ok');
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->where('product_id', $id)->first();
        return view('edit_cart', compact('carts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);

        Cart::where('id', $id)->update([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'subtotal' => $request->price * $request->qty,
        ]);

        return redirect('/cart')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::where('id', $id)->delete();
        return redirect('/cart')
                    ->with('success', 'Data Berhasil dihapus!');
    }
}
