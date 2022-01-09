@extends('layouts.frontend')

@push('style')
    <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endpush
@section('content')
    {{-- <div class="container">
        <div class="card">
            <div class="card-header">
                Produk
            </div>
            <div class="card-body d-flex align-items-center justify-content-around">
                @foreach ($products as $item)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($item->foto) }}" width="300" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->nama_produk }}</h5>
                          <p class="card-text">Price : {{ $item->harga }}</p>
                        </div>
                        <div class="card-footer row">
                            @auth
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="col-md">
                                    <input type="number" name="qty" placeholder="Quantity" id="" class="form-control">
                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-primary">Add to cart</button>

                                </div>
                            </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            
                          @endauth
                        </div>
                      </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
      
      
      <main>
      
        <section class="py-5 text-center container bg-gradient-primary">
          <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
              <h1 class="fw-light">Selamat Datang di-</h1>
              <h1 class="fw-light">West<span class="text-primary">Coast</span>Bike</h1>
              <p>
                <a href="#product" class="btn btn-primary my-2">Mulai Belanja</a>
              </p>
            </div>
          </div>
        </section>
      
        <div class="album py-5 bg-light">
          <div class="container" id="product">
      
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $item)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($item->foto) }}" width="300" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $item->nama_produk }}</h5>
                          <p class="card-text">Price : Rp. {{ format_uang($item->harga) }}</p>
                        </div>
                        <div class="card-footer">
                            @auth
                            <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group mb-2">
                                    <input type="number" name="qty" placeholder="Quantity" id="" class="form-control" value="1" min="1" required>

                                  </div>
                                <button type="submit" class="btn btn-primary btn-block w-100 mb-2">Add To Cart</button>
                            </form>
                        @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                            
                          @endauth
                        </div>
                      </div>
                </div>
                @endforeach
              

            </div>
          </div>
        </div>
      
      </main>
      
      <footer class="text-muted py-5">
        <div class="container">
          <p class="float-end mb-1">
            <a href="#">Back to top</a>
          </p>
        </div>
      </footer>
@endsection