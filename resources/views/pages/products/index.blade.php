@extends('layouts.default')
@section('content')
 <!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Products</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4 card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
            <a href="{{ route('products.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">Tambah Produk</a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                                <th>Nama Produk</th>
                                <th>Tipe Produk</th>
                                <th>Deskripsi Produk</th>
                                <th>Harga Produk</th>
                                <th>Stok Produk</th>
                                <th>Aksi</th>
                        </tr>
                    </thead>
                    @forelse ($items as $item)
                    <tbody>
                        <tr>
                            <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>@php echo htmlspecialchars_decode($item->description); @endphp </td>
                                    <td>Rp @php echo number_format($item->price,2,",","."); @endphp </td>
                                    <td>{{ $item->quantity }}</td>
                            <td><a href='{{ route('products.edit', $item->id) }}' class='btn btn-primary btn-sm'>
                                <i class='fa fa-pencil'></i>
                            </a>
                            <form action="{{ route('products.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                            </form>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center p-5">Data Tidak Ada</td>
                        </tr>
                        @endforelse
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
    </div>
</div>
@endsection
