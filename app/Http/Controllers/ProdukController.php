<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use Illuminate\Storage;
use Illuminate\Support\Facades\Storage as FacadesStorage;


class ProdukController extends Controller
{
    public function home(){
        return view('layouts.master');
    }

    public function createProduk()
    {
        $kategori = Kategori::all();
        return view('produk.create-produk', compact('kategori'));
    
    }

    public function storeProduk(Request $request)
    {
        // Validasi input
        $request->validate([
        'nama_produk' => 'required|string',
        'deskripsi' => 'required|string',
        'harga' => 'required|integer',
        'kategori_id' => 'required|exists:kategoris,id',
        'stok' => 'required|integer',
        'tanggal_ditambah' => 'required|date',
      
        ]);


        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi'=>$request->deskripsi,
            'harga'=>$request->harga,
            'kategori_id' => $request->kategori_id,
            'stok'=>$request->stok,
            'tanggal_ditambah'=>$request->tanggal_ditambah,

        ]);

        return redirect()->route('dataProduk');
    }

    public function showProduk(Request $request)
    {
        // $produk = Produk::with('kategori')->get();
        // return view('produk.produk', compact('produk'));

        $search = $request->input('search');

        $query = Produk::with('kategori');

        // Jika ada parameter pencarian
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('nama_produk', 'like', "%{$search}%")
                      ->orWhere('deskripsi', 'like', "%{$search}%")
                      ->orWhere('harga', 'like', "%{$search}%")
                      ->orWhereHas('kategori', function ($q) use ($search) {
                          $q->where('nama_kategori', 'like', "%{$search}%");
                      });
            });
        }

        // Ambil hasil query
        $produk = $query->get();

        // Kembalikan view dengan data produk
        return view('produk.produk', compact('produk'));
        }

        public function editProduk($produk_id)
        {
            $kategori = Kategori::all();
            $produk = Produk::get();
            $produk = Produk::where('id', $produk_id)->first();
        return view('produk.edit-produk', (compact('produk', 'kategori')));

    }

    public function updateProduk(Request $request, $produk_id)
    {

      // Validasi input
        $request->validate([
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|integer',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok' => 'required|integer',
            'tanggal_ditambah' => 'required|date',
        ]);

        Produk::where('id', $produk_id)->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'tanggal_ditambah' => $request->tanggal_ditambah,
        ]);

        return redirect()->route('dataProduk');
    }

    public function deleteProduk($produk_id)
    {
        Produk::where('id', $produk_id)->Delete();
        return redirect()->route('dataProduk');
    }
}

