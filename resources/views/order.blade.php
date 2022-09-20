@extends('layouts.masterLayouts')

@section('content')
<section class="container mt-5">
  <div class="container">
    <div class="row">
      <div class="container">
        <div class="page-breadcrumb">
          <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Order</h3>
              <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order</li>
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
                      <th>Nama User</th>
                      <th>Order Date</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $item)
                      <tr>
                        <td>#{{ $item->id }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->order_date }}</td>
                        <td>{{ number_format($item->total) }}</td>
                        <td>
                          @if ($item->status == 'unpaid')
                            <span class="btn btn-sm btn-danger">{{ $item->status }}</span>
                          @else                              
                            <span class="btn btn-sm btn-success">{{ $item->status }}</span>
                          @endif  
                        </td>
                        <td>
                          <a href="/order/{{ $item->id }}/detail" class="btn btn-info btn-sm text-white">Detail</a>
                        </td>
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