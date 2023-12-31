<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pembuatan;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Database\QueryException;


class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Pembuatan::join('produks', 'pembuatans.produk_id', '=', 'produks.id')
                            ->join('users', 'produks.user_id', '=', 'users.id')
                            ->select('pembuatans.*', 'produks.nama_produk','produks.foto_produk','produks.harga', 'users.name')
                            ->where('pembuatans.tanggal_jadi', '>', now())
                            ->get();
        // dd($produks);
        return view('home', compact('produks'));
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
    public function store(StoreProdukRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Pembuatan::join('produks', 'pembuatans.produk_id', '=', 'produks.id')
                            ->join('users', 'produks.user_id', '=', 'users.id')
                            ->select('pembuatans.*', 'produks.deskripsi','produks.nama_produk','produks.user_id','produks.foto_produk','produks.harga', 'users.name')
                            ->where('pembuatans.id', '=', $id)
                            ->first();
                            // dd($produk);
        $others = Pembuatan::join('produks', 'pembuatans.produk_id', '=', 'produks.id')
                            ->join('users', 'produks.user_id', '=', 'users.id')
                            ->where('produks.user_id', '=', $produk->user_id)
                            ->where('pembuatans.id', '!=', $produk->id)
                            ->where('pembuatans.tanggal_jadi', '>=', now())
                            ->select('pembuatans.*', 'produks.nama_produk','produks.foto_produk','produks.harga', 'users.name')
                            ->get();
        return view('product.index', compact('produk', 'others'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        //
    }

    public function find($id)
    {
        $produks = Pembuatan::join('produks', 'pembuatans.produk_id', '=', 'produks.id')
            ->join('users', 'produks.user_id', '=', 'users.id')
            ->join('profile_merchants', 'profile_merchants.user_id', '=', 'users.id')
            ->select('pembuatans.*', 'produks.nama_produk','produks.foto_produk','produks.harga', 'users.name', 'profile_merchants.header', 'profile_merchants.deskripsi')
            ->where('users.id', '=', $id)
            ->where('pembuatans.tanggal_jadi', '>=', now())
            ->get();
        
            $header = null; // Initialize with default value
            $name = null;   // Initialize with default value
            $deskripsi = null; // Initialize with default value
        if (!$produks->isEmpty()){
            dd($produks);
            $name = $produks->first()->name;
            $header = $produks->first()->header;
            $deskripsi = $produks->first()->deskripsi;
            return view('outlet.index', compact('produks', 'name', 'header', 'deskripsi'));
        } else {
            $produks = Pembuatan::join('produks', 'pembuatans.produk_id', '=', 'produks.id')
            ->join('users', 'produks.user_id', '=', 'users.id')
            // ->join('profile_merchants', 'profile_merchants.user_id', '=', 'users.id')
            ->select('pembuatans.*', 'produks.nama_produk','produks.foto_produk','produks.harga', 'users.name')
            ->where('users.id', '=', $id)
            ->where('pembuatans.tanggal_jadi', '>=', now())
            ->get();
            $name = $produks->first()->name;
            return view('outlet.index', compact('produks', 'name', 'header', 'deskripsi'));
        }
    }
}
