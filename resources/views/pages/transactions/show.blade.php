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
        <td>Rp @php echo number_format($item->transaction_total,2,",","."); @endphp </td>
    </tr>
    <tr>
        <th>Status</th>
        <td> {{ $item->transaction_status }} </td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100 text-center">
                <tr>
                    <th>Nama Produk</th>
                    <th>Tipe Produk</th>
                    <th>Harga Produk</th>
                    <th>Jumlah Produk</th>
                </tr>
                @foreach($item->details as $detail)
                <tr>
                    @if ($detail->product)
                    <td> {{ $detail->product->name }} </td>
                    <td> {{ $detail->product->type }} </td>
                    <td>Rp @php echo number_format($detail->product->price,2,",","."); @endphp </td>
                    <td> {{ $detail->quantity }} </td>
                    @else
                        <td colspan="4">Produk tidak ada</td>
                    @endif
                </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
