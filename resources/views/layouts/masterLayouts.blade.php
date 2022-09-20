<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panda e-commerce</title>
    <!-- Bootstrap stylesheet -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <!-- costomize style -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
</head>

<body>

    <!-- header start -->

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/"><img src="assets/images/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Petik">Petik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Pukul">Pukul</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#Tiup">Tiup</a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi bi-cart"></i>    
                                {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/home/profile">
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="/order">
                                        Transaksi
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                           <?php
                           $main_order = \App\Models\Order::where('user_id',Auth::user()->id)->where('status','unpaid')->first();
                           if(!empty($main_order))
                           {
                            $notif = \App\Models\OrderDetail::where('order_id',$main_order->id)->count();
                           }
                           ?>
                           <a href="/cart" class="nav-link">
                            <i class="fa fa-shopping-cart"></i>
                            @auth
                              <span class="badge text-bg-danger">{{ \App\Http\Controllers\Customer\CartController::count_cart(auth()->user()->id) }}</span>
                            @endauth
                            {{-- @if(!empty($notif))
                                <span class="badge text-bg-danger">{{ $notif }}</span>
                            @endif --}}
                           </a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-5">
            @yield('content')
        </main>
    <footer>
        <section class="container mt-5 text-center">
            <p><small>©2020. Panda Commerce. All rights reserved. Sofia, Bulgaria.
                Telephone   : 081252294287
                Email       : bintang@gmail.com   
                
            </small></p>
        </section>
    </footer>


    <!-- Js-bandle stylesheets -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>