@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transactions</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Transaksi</h6>
            <button onclick="exportToExcel()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button"><i
                class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</button>
                <a href="{{ route('transactions.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Tambah Transaksi</a>
            </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTransactions" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Total Transaksi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($items as $item)
                    <tbody>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>Rp @php echo number_format($item->transaction_total,2,",","."); @endphp </td>
                        <td>
                            @if ($item->transaction_status == 'PENDING')
                                <span class="badge badge-warning py-2 px-3">
                            @elseif ($item->transaction_status == 'SUCCESS')
                                <span class="badge badge-success py-2 px-3">
                            @elseif ($item->transaction_status == 'FAILED')
                                <span class="badge badge-danger py-2 px-3">
                            @else <span>
                            @endif
                            {{ $item->transaction_status }}
                            </span>
                        </td>

                        <td>
                            <a href='#mymodal'
                                data-remote="{{ route('transactions.show', $item->id) }}"
                                data-toggle="modal"
                                data-target="#mymodal"
                                data-title="Detail Transaksi - {{ $item->uuid }}"
                                class='btn btn-info  btn-sm'>
                                <i class='fa fa-eye'></i>
                            </a>
                            <a href='{{ route('transactions.edit', $item->id) }}' class='btn btn-primary btn-sm'>
                                <i class='fa fa-pencil'></i>
                            </a>

                            <form action="{{ route('transactions.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">Data Tidak Ada</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"> <!-- Tambahkan kelas modal-lg di sini -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endsection