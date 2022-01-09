@extends('layouts.frontend')

@section('content')
    <div class="container">
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
                          <p class="card-text">Price : Rp. {{ format_uang($item->harga) }}</p>
                        </div>
                        <div class="card-footer">
                            @auth
                            <form action="{{ route('cart.store') }}" class="form-inline" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="form-group mb-2">
                                    <input type="number" name="qty" placeholder="Quantity" id="" value="1" min="1" required class="form-control">

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
@endsection