@extends('layouts.masterLayouts')

@section('content')
<section class="container mt-5">
  <div class="container">
    <div class="row">
      <div class="container">
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Profile</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail {{$carts->product->name}}</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h2>{{$carts->product->name}}</h2>
          </div>
          <div class="card-body mt-5">
            <div class="row">
              <div class="col-md-6 ">
                <img src="{{url ('assets/images/'.$carts->product->image) }}" width="100%" class="rounded mx-auto d-block" alt="">
              </div>
              <div class="col-md-6 mt-5">
                <h2>{{$carts->product->name}}</h2>
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Harga</td>
                      <td>:</td>
                      <td class="fw-bold">Rp. {{ number_format($carts->product->price) }}</td>
                    </tr>
                    <tr>
                      <td>Stock</td>
                      <td>:</td>
                      <td>{{$carts->product->stock}}</td>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td>:</td>
                      <td>{{$carts->product->description}}</td>
                    </tr>
                    <tr>
                      <td>Jumlah Pesan</td>
                      <td>:</td>
                      <td>
                        <form action="/cart/{{ $carts->id }}" method="POST">
                          @csrf
                          @method('PUT')

                          <input type="hidden" name="price" value="{{ $carts->product->price }}" id="">
                          <input type="hidden" name="product_id" value="{{ $carts->product->id }}" id="">
                          <input type="number" name="qty" class="form-control" required="" value="{{ $carts->qty }}">
                          <button type="submit" class="panda-button-bye-now mt-2"><i class="fa fa-shopping-cart"></i> Update Cart</button>
                        </form>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection