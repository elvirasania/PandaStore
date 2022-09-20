@extends('admin.layouts.main')

@section('content')
<div class="page-breadcrumb">
  <div class="row align-items-center">
    <div class="col-md-6 col-8 align-self-center">
      <h3 class="page-title mb-0 p-0">Profile</h3>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
      </div>
    </div>

  </div>
</div>
<div class="container-fluid">
  <!-- Row -->
  <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <div class="card-body profile-card">
          <center class="mt-4">
            @if (Auth::user()->image == null)
              <img src="{{ asset('admin/images/users/5.jpg') }}" class="rounded-circle" width="150" />
            @else
              <img src="{{ asset('storage/'.Auth::user()->image) }}" class="rounded-circle" width="150" />
            @endif

            <h4 class="card-title mt-2">Bintang</h4>
            <h6 class="card-subtitle">ADMIN</h6>
            <div class="row justify-content-center">
              <div class="col-4">
                <a href="javascript:void(0)" class="link">
                <i class="icon-people" aria-hidden="true"></i>
                <span class="font-normal">254</span>
                </a>
              </div>
              <div class="col-4">
                <a href="javascript:void(0)" class="link">
                <i class="icon-picture" aria-hidden="true"></i>
                <span class="font-normal">54</span>
                </a>
              </div>
            </div>
          </center>
        </div>
      </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" method="POST" action="/admin/update_profile" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12 mb-0">Full Name</label>
              <div class="col-md-12">
                <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Johnathan Doe"
                  class="form-control ps-0 form-control-line @error('name') is-invalid @enderror">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-md-12">Email</label>
              <div class="col-md-12">
                <input type="email" readonly value="{{ Auth::user()->email }}" read placeholder="johnathan@admin.com"
                  class="form-control ps-0 form-control-line" name="email"
                  id="email">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Phone No</label>
              <div class="col-md-12">
                <input type="number" name="phone_number" value="{{ Auth::user()->phone_number }}" 
                  class="form-control ps-0 form-control-line @error('phone_number') is-invalid @enderror">
                  @error('phone_number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 mb-0">Address</label>
              <div class="col-md-12">
                <input type="text" name="address" value="{{ Auth::user()->address }}" 
                  class="form-control ps-0 form-control-line @error('address') is-invalid @enderror">
                  @error('address')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-12 mb-0">Gender</label>
              <div class="col-md-12">
                <select name="gender" class="form-control ps-0 form-control-line @error('gender') is-invalid @enderror">
                  <option value="L" {{ (Auth::user()->gender == 'L') ? 'selected' : '' }}>{{ 'Laki-laki' }}</option>
                  <option value="P" {{ (Auth::user()->gender == 'P') ? 'selected' : '' }}>{{ 'Perempuan' }}</option>
                </select>

                @error('gender')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12 mb-0">Image</label>
              <div class="col-md-12">
                <input type="file" name="image" placeholder="123 456 7890"
                  class="form-control ps-0 form-control-line @error('image') is-invalid @enderror">
                  @error('image')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12 d-flex">
                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update
                Profile </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <form class="form-horizontal form-material mx-2" method="POST" action="/admin/update_password" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
              <label class="col-md-12 mb-0">Password Baru</label>
              <div class="col-md-12">
                <input type="password" name="password" placeholder="Password"
                  class="form-control ps-0 form-control-line @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-12 mb-0">Password Konfirmasi</label>
              <div class="col-md-12">
                <input type="password" name="password_confirmation" placeholder="Password confirmation"
                  class="form-control ps-0 form-control-line @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12 d-flex">
                <button type="submit" class="btn btn-primary mx-auto mx-md-0 text-white">Update
                Password </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Column -->
  </div>
</div>
@endsection