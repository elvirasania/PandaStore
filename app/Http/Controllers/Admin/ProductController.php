<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = category::all();
        return view('admin.product.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name'=>'required',
            'Description'=>'required',
            'Price'=>'required',
            'Stock'=>'required',
            'Rating'=>'required',
        ]);

        $image_name = null;
        if($request->file('Image')){
            $image_name=$request->file('Image')->store('images','public');
        }

        //fungsi eloquent untuk menambahkan data
        $product = new Product;
        $product->name = $request->get('Name');
        $product->description = $request->get('Description');
        $product->price = $request->get('Price');
        $product->stock = $request->get('Stock');
        $product->rating = $request->get('Rating');
        $product->image = $image_name;
       
        $category = new Category;
        $category->id = $request->get('Category');

        $product->category()->associate($category); //relasi
        $product->save();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->to('admin/product')
        ->with('success','Produk Berhasil Ditambahakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Product::where('id', $id)->first();
        return view('admin.product.index', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::where('id', $id)->first();
        $category = category::all();
        return view('admin.product.edit', compact('item','category'));
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
            'Name'=>'required',
            'Description'=>'required',
            'Category'=>'required',
            'Price'=>'required',
            'Stock'=>'required',
            'Rating'=>'required',
        ]);

        $row = Product::where('id', $id)->first();

        if($request->image && file_exists(storage_path('app/public/'. $request->image))) {
            Storage::delete('public/' . $request->image);
        }

        $name_image = null;

        if($request->file('image')){
            $name_image = $request->file('image')->store('images','public');
        }

        Product::where('id', $id)->update([
            'name' => $request->Name,
            'category_id' => $request->Category,
            'description' => $request->Description,
            'price' => $request->Price,
            'stock' => $request->Stock,
            'rating' => $request->Rating,
            'image' => ($name_image == null) ? $row->image : $name_image,
        ]);
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->to('/admin/product')
        ->with('success','Product Berhasil Ditambahakan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('id', $id)->delete();
        return redirect()->to('/admin/product')
                    ->with('success', 'Berhasi menghapus');
    }
}
