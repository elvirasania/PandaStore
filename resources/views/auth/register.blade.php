<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  
<section class="vh-100" style="background-color: #FCEAE8;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <form action="{{ route('register') }}" method="post">
                @csrf
                
                <h3 class="mb-5">SIGN UP</h3>
                
                <div class="form-outline mb-4">
                  <input type="text" id="typeNameX-2" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" />
                  <label class="form-label" for="typeNameX-2">Name</label>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" />
                  <label class="form-label" for="typeEmailX-2">Email</label>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
    
                <div class="form-outline mb-4">
                  <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                  <label class="form-label" for="typePasswordX-2">Password</label>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="typePasswordX-2" name="password_confirmation" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" />
                  <label class="form-label" for="typePasswordX-2">Password Confirmation</label>
                  @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
    
                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                  <label class="form-check-label" for="form1Example3"> Remember password </label>
                </div>
    
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
              </form>
              
              <p>Dont have accont? <a href="/register">Register</a></p>
              {{-- <br> --}}
              <a href="/home">Kembali</a>
              <hr class="my-4">
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>