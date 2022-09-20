@extends('layouts.masterLayouts')

@section('content')
<section class="container mt-5">
  <div class="container">
    <div class="row">
      <div class="container">
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Order Detail</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/order">Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Order</li>
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
            <h2>{{ auth()->user()->email }}</h2>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
               
                @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                @endif

                @if(session('danger'))
                  <div class="alert alert-danger">
                    {{session('danger')}}
                  </div>
                @endif

                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>OrderID</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>QTY</th>
                      <th>Subtotal</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($order_detail as $item)
                      <tr>
                        <td>#{{ $item->order_id }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp. {{ number_format($item->price) }}</td>
                        <td>{{ number_format($item->qty) }}</td>
                        <td>Rp. {{ number_format($item->subtotal) }}</td>                        
                      </tr>
                    @endforeach
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