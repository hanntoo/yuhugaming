<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <td> {{ $item->name }} </td>
    </tr>
    <tr>
        <th>Email</th>
        <td> {{ $item->email }} </td>
    </tr>
    <tr>
        <th>Telepon</th>
        <td> {{ $item->phone }} </td>
    </tr>
    {{-- <tr>
        <th>Alamat</th>
        <td> {{ $item->address }} </td>
    </tr> --}}
    <tr>
        <th>Total Transaksi</th>
        <td> {{ $item->transaction_total }} </td>
    </tr>
    <tr>
        <th>Status</th>
        <td> {{ $item->transaction_status }} </td>
    </tr>
    <tr>
        <th>Detail Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama Produk</th>
                    <th>Tipe Produk</th>
                    <th>Harga Produk</th>
                </tr>
                @foreach($item->details as $detail)
                <tr>
                    @if ($detail->product)
                    <td> {{ $detail->product->name }} </td>
                    <td> {{ $detail->product->type }} </td>
                    <td> {{ $detail->product->price }} </td>
                    @else
                        <td colspan="3">Produk tidak ada</td>
                    @endif
                </tr>
                @endforeach
            </table>
            {{-- <div class="row">
                <div class="col-4">
                    <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS" class="btn btn-success btn-block">
                        <i class="fa fa-check"></i>
                        SET SUCCESS
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('transactions.status', $item->id) }}?status=FAILED" class="btn btn-danger btn-block">
                        <i class="fa fa-check"></i>
                        SET GAGAL
                    </a>
                </div>
                <div class="col-4">
                    <a href="{{ route('transactions.status', $item->id) }}?status=PENDING" class="btn btn-info btn-block">
                        <i class="fa fa-check"></i>
                        SET PENDING
                    </a>
                </div>
            </div> --}}
        </td>
    </tr>
</table>
