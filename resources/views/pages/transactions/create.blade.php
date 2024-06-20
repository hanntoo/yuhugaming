@extends('layouts.default')
@section('content')
<div class="card m-auto w-75">
    <div class="card-header">
        <strong>Tambah Transaksi</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transactions.store') }}" method='post'>
            @csrf
            <div class="form-group">
                <label for="uuid" class="form-control-label">UUID</label>
                <input type="text" name="uuid" value="{{ old('uuid') }}" class="form-control @error('uuid') is-invalid @enderror" />
                @error('uuid') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-control-label">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" />
                @error('name') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" />
                @error('email') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="phone" class="form-control-label">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" />
                @error('phone') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="product_id" class="form-control-label">Product</label>
                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-control-label">Price</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" readonly />
                @error('price') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="quantity" class="form-control-label">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" />
                @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="transaction_total" class="form-control-label">Total Transaksi</label>
                <input type="text" id="transaction_total" name="transaction_total" readonly value="{{ old('transaction_total') }}" class="form-control @error('transaction_total') is-invalid @enderror" />
                @error('transaction_total') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="transaction_status" class="form-control-label">Status</label>
                <select name="transaction_status" class="form-control @error('transaction_status') is-invalid @enderror">
                    <option value="SUCCESS">SUCCESS</option>
                    <option value="PENDING">PENDING</option>
                </select>
                @error('transaction_status') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-block w-25 m-auto" type="submit">Tambah Transaksi</button>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const productSelect = document.getElementById('product_id');
        const priceInput = document.getElementById('price');
        const quantityInput = document.getElementById('quantity');
        const totalInput = document.getElementById('transaction_total');

        productSelect.addEventListener('change', function () {
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            priceInput.value = price;
            updateTotal();
        });

        quantityInput.addEventListener('input', function () {
            updateTotal();
        });

        function updateTotal() {
            const price = parseFloat(priceInput.value) || 0;
            const quantity = parseFloat(quantityInput.value) || 0;
            const total = price * quantity;
            totalInput.value = formatRupiah(total);
        }

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(angka);
        }
    });
</script>
