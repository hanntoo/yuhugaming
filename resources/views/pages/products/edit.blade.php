@extends('layouts.default')
@section('content')
<div class="card m-auto w-75">
    <div class="card-header">
        <strong>Ubah Produk - {{ $item->name }}</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('products.update', $item->id) }}" method='post'>
            @method('PUT')
            @csrf
        <div class="form-group">
            <label for="name" class="form-control-label">Nama Produk </label>
            <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control
            @error('name') is-invalid @enderror" />
            @error('name') <div class="text-muted"> {{$message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="type" class="form-control-label">Tipe Produk </label>
            <input type="text" name="type" value="{{ old('type') ? old('type') : $item->type }}" class="form-control
            @error('type') is-invalid @enderror" />
            @error('type') <div class="text-muted"> {{$message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="description" class="form-control-label">Deskripsi Produk </label>
            <textarea name="description" class="ckeditor form-control @error('description') 
                    is-invalid @enderror"> {{ old('description') ? old('description') : $item->description }} </textarea>
            @error('description') <div class="text-muted"> {{$message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="price" class="form-control-label">Harga Produk </label>
            <input type="number" name="price" value="{{ old('price') ? old('price') : $item->price }}" class="form-control
            @error('price') is-invalid @enderror" />
            @error('price') <div class="text-muted"> {{$message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="quantity" class="form-control-label">Stok Produk </label>
            <input type="number" name="quantity" value="{{ old('quantity') ? old('quantity') : $item->quantity }}" class="form-control
            @error('quantity') is-invalid @enderror" />
            @error('quantity') <div class="text-muted"> {{$message }}</div> @enderror
        </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block w-25 m-auto" type="submit">Ubah Produk</button>
            </div>
        </form>
    </div>
</div>
@endsection
