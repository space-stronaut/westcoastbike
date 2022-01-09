@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>
                    Product
                </span>
                <span>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">Kembali</a>
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" placeholder="Nama Produk" class="form-control">
                    </div>
                    @error('nama_produk')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group">
                        <input type="number" name="harga" value="{{ $product->harga }}" placeholder="Harga" class="form-control">
                    </div>
                    @error('harga')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group">
                        <input type="file" name="foto" placeholder="Foto" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control">{{ $product->deskripsi }}</textarea>
                    </div>
                    @error('deskripsi')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group">
                        <select name="category_id" id="" class="form-control">
                            <option value="">Pilih Kategori...</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                            <div class="form-group mt-2">
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            </div>
                    @enderror
                    <div class="form-group mt-2">
                        <button class="btn btn-primary">Store</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection