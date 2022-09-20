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
            <li class="breadcrumb-item active" aria-current="page">Tambahkan Data</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-md-6 col-4 align-self-center">
      <div class="text-end upgrade-btn">
        <a href="/admin/user"
          class="btn btn-success d-none d-md-inline-block text-white">Kembali</a>
      </div>
  </div>
</div>
<div class="container-fluid mt-3">
<div class="row">    
<div class="col-lg-12 col-xlg-9 col-md-7">
      <div class="card">
        <div class="card-body">
        <form method="post" action="{{ route('user.create') }}" id="myForm" class="form-horizontal form-material mx-2">
            @csrf
            <div class="form-group">
                <label class="col-md-12 mb-0" >Nama</label> 
                <div class="col-md-12">
                <input type="text" name="Name" class="form-control ps-0 form-control-line @error('name') is-invalid @enderror" value="{{ old('name') }}"> 
              @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0" >Email</label> 
                <div class="col-md-12">
                <input type="text" name="Email" class="form-control ps-0 form-control-line @error('email') is-invalid @enderror" value="{{ old('email') }}"> 
              @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0" >Alamat</label> 
                <div class="col-md-12">
                <input type="text" name="Address" class="form-control ps-0 form-control-line @error('address') is-invalid @enderror" value="{{ old('address') }}"> 
              @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0" >Nomor HP</label> 
                <div class="col-md-12">
                <input type="text" name="Phone_number" class="form-control ps-0 form-control-line @error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" > 
              @error('phone_number')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0" >Jenis Kelamin</label> 
                <div class="col-md-12">
                <select type="enum" name="Gender" class="form-control ps-0 form-control-line @error('gender') is-invalid @enderror" value="{{ old('gender') }}">
                  <option>L</option>
                  <option>P</option>
                </select> 
              @error('gender')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0" >Level</label> 
                <div class="col-md-12">
                <select name="level" class="form-control ps-0 form-control-line @error('level') is-invalid @enderror">
                  @foreach ($level as $lvl)
                  <option value="{{$lvl->id}}" {{$lvl->level_id == $lvl->id ? 'selected' : ''}} > {{$lvl->level}} </option>
                  @endforeach
                </select> 
              @error('level')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-12 mb-0" >Image</label> 
                <div class="col-md-12">
                <input type="file" name="Image" class="form-control ps-0 form-control-line @error('image') is-invalid @enderror" value="{{ old('image') }}"> 
                @error('image')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</div>
</div>
@endsection