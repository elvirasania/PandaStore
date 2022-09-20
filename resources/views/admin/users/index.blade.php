@extends('admin.layouts.main')
@section('content')
<div class="page-breadcrumb">
  <div class="row align-items-center">
    <div class="col-md-6 col-8 align-self-center">
      <h3 class="page-title mb-0 p-0">Table User</h3>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/user">Home</a></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-md-6 col-4 align-self-center">
      <div class="text-end upgrade-btn">
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
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
          <h4 class="card-title">Table User</h4>
          <h6 class="card-subtitle">List Table <code>User</code></h6>
          <div class="table-responsive">
            <table class="table user-table no-wrap">
              <thead>
                <tr>
                  <th class="border-top-0">#</th>
                  <th class="border-top-0">Email User</th>
                  <th class="border-top-0">Alamat</th>
                  <th class="border-top-0">Nomer HP</th>
                  <th class="border-top-0">Jenis Kelamin</th>
                  {{-- <th class="border-top-0">Gambar</th> --}}
                  <th class="border-top-0">Level</th>
                  <th class="border-top-0">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->phone_number }}</td>
                    <td>{{ $item->gender }}</td>
                    {{-- <td><img style="width: 50px; overflow:hidden" src="{{ asset('./assets/'. $item->image)}}" alt=""></td> --}}
                    <td>{{ $item->level->level }}</td>
                    <td>
                      <form action="/admin/user/{{ $item->id }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data?')" method="post">
                      @csrf
                      @method('DELETE')

                      <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-info btn-sm text-light">Edit</a>
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