<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Transaction::where('transaction_status', 'PENDING')->get();

        return view('pages.dashboard', [
            'items' => $items
        ]);
    }

    public function edit(string $id)
    {
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Update status transaksi menjadi "FAILED"
        $transaction->update([
            'transaction_status' => 'FAILED',
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status transaksi berhasil diubah menjadi FAILED.');
    }

    public function show(string $id)
    {
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Update status transaksi menjadi "FAILED"
        $transaction->update([
            'transaction_status' => 'SUCCESS',
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Status transaksi berhasil diubah menjadi FAILED.');
    }



}
