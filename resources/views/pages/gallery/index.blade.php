@extends('layouts.default')
@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name Barang</th>
                                        <th>foto</th>
                                        <th>default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                  @forelse ($items as $item)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$item->products->name}}</td>
                                        <td>
                                            <img src="{{ url($item->photo) }}" alt="">
                                        </td>
                                        <td>{{$item->is_default? 'Ya' :'Tidak'}}</td>
                                        <td>
                                            
                                            <form action="{{ route('gallery.destroy',$item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                        @php
                                            $no++;
                                        @endphp
                                    </tr>
                                  @empty
                                  <tr>
                                      <td colspan="6" class="text-center">
                                          <span>Data Masih Kosong</span>
                                      </td>
                                  </tr>
                                      
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection