@extends('layouts.default')
@section('content')
<div class="card m-auto w-75">
    <div class="card-header">
        <strong>Ubah Transaksi - {{ $item->name  }}</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transactions.update', $item->id) }}" method='post'>
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="uuid" class="form-control-label">UUID</label>
                <input type="text" name="uuid" value="{{ old('uuid') ? old('uuid') : $item->uuid }}" class="form-control @error('uuid') is-invalid @enderror" />
                @error('uuid') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="name" class="form-control-label">Nama</label>
                <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control @error('name') is-invalid @enderror" />
                @error('name') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="text" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control @error('email') is-invalid @enderror" />
                @error('email') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="phone" class="form-control-label">Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') ? old('phone') : $item->phone }}" class="form-control @error('phone') is-invalid @enderror" />
                @error('phone') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="transaction_total" class="form-control-label">Total Transaksi</label>
                <input type="text" id="transaction_total" name="transaction_total" readonly value="{{ old('transaction_total') ? old('transaction_total') : $item->transaction_total }}" class="form-control @error('transaction_total') is-invalid @enderror" />
                @error('transaction_total') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="transaction_status" class="form-control-label">Status</label>
                <select name="transaction_status" class="form-control @error('transaction_status') is-invalid @enderror">
                    <option value="PENDING" {{ (old('transaction_status') == 'PENDING' || $item->transaction_status == 'PENDING') ? 'selected' : '' }}>PENDING</option>
                    <option value="SUCCESS" {{ (old('transaction_status') == 'SUCCESS' || $item->transaction_status == 'SUCCESS') ? 'selected' : '' }}>SUCCESS</option>
                    <option value="FAILED" {{ (old('transaction_status') == 'FAILED' || $item->transaction_status == 'FAILED') ? 'selected' : '' }}>FAILED</option>
                </select>
                @error('transaction_status') <div class="text-muted">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block w-25 m-auto" type="submit">Ubah Transaksi</button>
            </div>
        </form>
    </div>
</div>
@endsection
