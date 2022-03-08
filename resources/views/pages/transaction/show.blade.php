<table class="table table-borderd">
    <tr>
        <th>Nama</th>
        <td>{{$items->name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$items->Email}}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{$items->Nomor}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$items->Address}}</td>
    </tr>
    <tr>
        <th>Total Transaction</th>
        <td>{{$items->trancation_total}}</td>
    </tr>
    <tr>
        <th>Status Transaction</th>
        <td>{{$items->trancation_status}}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100" >
                <tr>
                    <th>Name</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                //untuk memanggil relasi 
                @foreach ($items->details as $details)
                    <tr>
                        <td>{{$detail->product->name}}</td>
                        <td>{{$detail->product->type}}</td>
                        <td>{{$detail->product->price}}</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
{{-- <div class="row">
    <div class="col-md-4">
        <a href="{{ route('transaction.status', $items->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>Set Sukses
        </a>
        <a href="{{ route('transaction.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>Set Sukses
        </a>
        <a href="{{ route('transaction.status', $item->id) }}?status=PENDING" class="btn btn-success btn-block">
            <i class="fa fa-spinner"></i>Set Sukses
        </a>
    </div>
</div> --}}