@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Transaction</strong>
            <small>{{$items->uuid}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transaction.update',$items->id) }}" method="POST">
               
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid  @enderror" value="{{ old('name') ? old('name') : $items->name }}">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-control-label">Email</label>
                    <input email="text" name="email" class="form-control @error('email')is-invalid  @enderror" value="{{old('email') ? old('email'):$items->email}}">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="number" class="form-control-label"> Number</label>
                    <input type="text" name="number" class="form-control @error('number')is-invalid  @enderror" value="{{old('number') ? old('number'):$items->number}}">
                    @error('number')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address" class="form-control-label"> Alamat Pemesan</label>
                    <input type="text" name="address" class="form-control @error('address')is-invalid  @enderror" value="{{old('address') ? old('address'):$items->address}}">
                    @error('address')
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