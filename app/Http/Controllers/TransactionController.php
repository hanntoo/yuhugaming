<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Transaction::all();
        return view('pages.transactions.index')->with([
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.transactions.create', compact('products'));
    }


    public function gagal(string $id)
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


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // // Validasi data yang diterima
        $request->validate([
            'uuid' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:20',
            'transaction_total' => 'required',
            'transaction_status' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Periksa apakah quantity produk mencukupi
        if ($product->quantity < $request->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Quantity of the product is not sufficient.'])->withInput();
        }

        // Kurangi quantity produk
        $product->quantity -= $request->quantity;
        $product->save();

        // Siapkan data untuk disimpan ke transaksi
        $data = $request->all();
        $data['transaction_total'] = $request->price * $request->quantity;

        // Simpan transaksi ke database
        Transaction::create($data);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = Transaction::with('details.product')->findOrFail($id);
        return view('pages.transactions.show')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Transaction::findOrFail($id);
        $products = Product::all();
        return view('pages.transactions.edit', compact('products'))->with([
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $item = Transaction::findOrFail($id);
        $item->update($data);
        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Transaction::findOrFail($id);
        $item->delete();
        return redirect()->route('transactions.index');
    }
}
