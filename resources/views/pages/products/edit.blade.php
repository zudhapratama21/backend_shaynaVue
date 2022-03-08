@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Data</strong>
            <small>{{$items->name}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update',$items->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid  @enderror" value="{{ old('name') ? old('name') : $items->name }}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type" class="form-control-label">tipe Barang</label>
                    <input type="text" name="type" class="form-control @error('type')is-invalid  @enderror" value="{{old('type') ? old('type'):$items->type}}">
                    @error('type')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="description" class="ckeditor form-control @error('description')is-invalid  @enderror" id="" cols="30" rows="10">{{old('description') ? old('name'):$items->description }}</textarea>
                    @error('description')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price" class="form-control-label">Harga Barang</label>
                    <input type="text" name="price" class="form-control @error('price')is-invalid  @enderror" value="{{old('price') ? old('price'):$items->price}}">
                    @error('price')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity" class="form-control-label">Stock Barang</label>
                    <input type="text" name="quantity" class="form-control @error('quantity')is-invalid  @enderror" value="{{old('quantity') ? old('quantity'):$items->quantity}}">
                    @error('quantity')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Update Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection