@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('gallery.store') }}" enctype="multipart/form-data"  method="POST">
                @csrf
                <div class="form-group">
                    <label for="products_id" class="form-control-label">Nama Barang</label>
                    <select name="products_id" class="form-control  @error('products_id')is-invalid  @enderror ">
                            @forelse ($items as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @empty
                                <option value="">Data Kosong</option>
                            @endforelse
                    </select>
                    @error('products_id')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="photo" class="form-control-label">Stock Barang</label>
                    <input type="file" name="photo" class="form-control @error('photo')is-invalid  @enderror" value="{{old('photo')}}" accept="image/*">
                    @error('photo')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                  
                <div class="form-group">
                    <label for="photo" class="form-control-label">Apakah Default ?</label>
                    <label >
                        <input type="radio" name="is_default" class="form-control @error('is_default')is-invalid  @enderror" value="1"> Ya
                    </label> 
                    &nbsp;
                    <label >
                        <input type="radio" name="is_default" class="form-control @error('is_default')is-invalid  @enderror" value="0"> Tidak
                    </label>
                    
                    @error('is_default')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button  type="submit" class="btn btn-primary btn-block">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
@endsection