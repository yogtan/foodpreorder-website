<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Pembuatan;
use Illuminate\Http\Request;

class MerchantOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::join('pembuatans', 'orders.pembuatan_id', '=', 'pembuatans.id')
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->join('produks', 'pembuatans.produk_id', '=', 'produks.id')
                            ->select('orders.*', 'produks.nama_produk', 'users.name')
                            ->where('produks.user_id', '=', auth()->user()->id)
                            ->get();
        $totalOrders = $orders->count();
        // dd($orders);
        return view('penjual.pesanan', compact('orders','totalOrders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        $pembuatan = Pembuatan::join('orders', 'orders.pembuatan_id', '=', 'pembuatans.id')
        ->where('orders.id', '=', $order->id)
        ->select('orders.*','pembuatans.tanggal_jadi', 'pembuatans.tanggal_pembuatan')
        ->get();
        // dd($pembuatan);
        // $photo = $order->bukti_pembayaran;
        return view('penjual.viewBukti', compact('order', 'pembuatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Data Pembelian tidak ditemukan.');
        }

        $order->status = 'Selesai';
        $order->save();

        return redirect('/penjual/kelolaPesanan')->with('success', 'Pembayaran Makanan Lunas!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Order::destroy($id);
            return redirect('/penjual/kelolaPesanan')->with('success', 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect('/penjual/kelolaPesanan')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
