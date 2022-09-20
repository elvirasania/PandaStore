@extends('layouts.masterLayouts')

@section('content')

        <!-- imsge slider -->

        <section class="container mt-5">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row p-5 panda-bg-info d-flex align-items-center">
                            <div class="col-lg-7">
                                <h1>Cort CR200 Electric Guitar</h1>
                                <p>The Classic Rock Series delivers the look, feel and performance of the much sought-after vintage instruments from the Golden Era of electric guitars</p>
                                <h1 class=" text-panda">Rp 3830000</h1>
                                <button class="panda-button-bye-now">Buy Now</button>
                            </div>
                            <div class="col-lg-5">
                                <img src="assets/images/banner-images/banner1.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row p-5 panda-bg-info d-flex align-items-center">
                            <div class="col-lg-7">
                                <h1>Yamaha Drum Rydeen Set</h1>
                                <p>The level of equipment and manufacturing techniques found in Yamaha’s Rydeen 5-Piece Drum Set easily equals that of kits costing hundreds more.</p>
                                <h1 class=" text-panda">Rp 10990000</h1>
                                <button class="panda-button-bye-now">Buy Now</button>
                            </div>
                            <div class="col-lg-5">
                                <img src="assets/images/banner-images/banner2.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row p-5 panda-bg-info d-flex align-items-center">
                            <div class="col-lg-7">
                                <h1>Yamaha YSL-891Z Trombone</h1>
                                <p>Student trombones need to be reliable and well made due to the importance of the slides.</p>
                                <h1 class=" text-panda">Rp 45640000</h1>
                                <button class="panda-button-bye-now">Buy Now</button>
                            </div>
                            <div class="col-lg-5">
                                <img src="assets/images/banner-images/banner3.png" class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </section>

    </header>

    <main>

        <!-- categories section -->

        <section class="container">
            <div class="row g-5 my-4  categories">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="p-3 rounded-3 bg-warning d-flex align-items-center justify-content-between">
                        <h1 class="text-white">Petik</h1>
                        <img src="assets/images/categories/petik.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="p-3 rounded-3 panda-bg-success d-flex align-items-center justify-content-between">
                        <h1 class="text-white">Pukul</h1>
                        <img src="assets/images/categories/pukul.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="p-3 rounded-3 bg-primary d-flex align-items-center justify-content-between">
                        <h1 class="text-white">Tiup</h1>
                        <img src="assets/images/categories/tiup.png" alt="">
                    </div>
                </div>
            </div>
        </section>

        <!-- Petik container -->

        <section class="container my-5" id="Petik">
            <div class="row  gx-5 mb-4 ">
                <h2 class="mt-5">Alat Musik Petik</h2>
                @foreach ($products as $p)
                @if ($p->category_id == 1)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card border-0 shadow-lg h-100">
                        <img src="{{ asset('storage/'.$p->image) }}" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$p -> name}}</h4>
                            <p class="card-text">{{$p -> description}}</p>
                            <h4>Rp {{$p -> price}}</h4>
                            <a href="/detail/{{$p->id}}"><button class="panda-button-bye-now">Buy Now>></button></a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section> 
        <section class="container my-5" id="Pukul">
            <div class="row  gx-5 mb-4 ">
                <h2 class="mt-5">Alat Musik Pukul</h2>
                @foreach ($products as $p)
                @if ($p->category_id == 2)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card border-0 shadow-lg h-100">
                        <img src="{{ asset('storage/'.$p->image) }}" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$p -> name}}</h4>
                            <p class="card-text">{{$p -> description}}</p>
                            <h4>Rp {{$p -> price}}</h4>
                            <a href="/detail/{{$p->id}}"><button class="panda-button-bye-now">Buy Now>></button></a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section> 
        <section class="container my-5" id="Tiup">
            <div class="row  gx-5 mb-4 ">
                <h2 class="mt-5">Alat Musik Tiup</h2>
                @foreach ($products as $p)
                @if ($p->category_id == 3 )
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card border-0 shadow-lg h-100">
                        <img src="{{ asset('storage/'.$p->image) }}" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$p -> name}}</h4>
                            <p class="card-text">{{$p -> description}}</p>
                            <h4>Rp {{$p -> price}}</h4>
                            <a href="/detail/{{$p->id}}"><button class="panda-button-bye-now">Buy Now>></button></a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section> 

    </main>
@endsection