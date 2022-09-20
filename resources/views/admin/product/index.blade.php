@extends('admin.layouts.main')
@section('content')
<div class="page-breadcrumb">
  <div class="row align-items-center">
    <div class="col-md-6 col-8 align-self-center">
      <h3 class="page-title mb-0 p-0">Table Product</h3>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/product">Home</a></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-md-6 col-4 align-self-center">
      <div class="text-end upgrade-btn">
        <a href="{{route ('product.create')}}"
          class="btn btn-success d-none d-md-inline-block text-white">Tambah Data</a>
      </div>
    </div>
  </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
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
  <div class="row">
    <!-- column -->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Table Product</h4>
          <h6 class="card-subtitle">List Table <code>Product</code></h6>
          <div class="table-responsive">
            <table class="table user-table no-wrap">
              <thead>
                <tr>
                  <th class="border-top-0">#</th>
                  <th class="border-top-0">Nama Produk</th>
                  <th class="border-top-0">Nama Category</th>
                  <th class="border-top-0">Deskripsi</th>
                  <th class="border-top-0">Price</th>
                  <th class="border-top-0">Stock</th>
                  <th class="border-top-0">Rating</th>
                  <th class="border-top-0">Image</th>
                  <th class="border-top-0">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->category }}</td>
                    <td>{{ substr($item->description, 0, 50) }}...</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->rating }}</td>
                    <td><img style="width: 50px; overflow:hidden" src="{{ asset('./storage/'. $item->image)}}" alt=""></td>
                    <td>
                      <form action="/admin/product/{{ $item->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                      @csrf
                      @method('DELETE')

                      <a href="{{ route('product.edit',$item->id)}}" class="btn btn-info btn-sm text-light">Edit</a>
                      <button type="submit" class="btn btn-danger btn-sm text-light">Hapus</button>
                      </form>
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
@endsection