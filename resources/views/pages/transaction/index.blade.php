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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status Transaksi</th>
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
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->Email}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->trancation_total}}</td>
                                        <td>
                                            @if ($item->trancation_status == "PENDING")
                                                <span class="badge badge-primary">
                                            @elseif($item->trancation_status == "SUCCESS")
                                                <span class="badge badge-success">  
                                            @elseif($item->trancation_status == "FAILED")
                                                <span class="badge badge-danger">
                                            @else
                                                <span>
                                            @endif
                                             {{$item->trancation_status}} </span>
                                        </td>
                                        <td>
                                            @if ($item->trancation_status == 'PENDING')
                                                <a href="{{ route('transaction.status',$item->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i></a>
                                                <a href="{{ route('transaction.status',$item->id) }}?status=FAILED" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times"></i></a>
                                            @endif
                                        
                                            <a href="#mymodal" data-remote="{{ route('transaction.show',$item->id) }}"
                                            data-toggle="modal" data-target ="#mymodal" data-title="Detail Transaksi {{$item->uuid}}" 
                                            class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                            <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                           

                                            <form action="{{ route('transaction.destroy',$item->id) }}" method="POST" class="d-inline">
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
                                          <span >Data Masih Kosong</span>
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