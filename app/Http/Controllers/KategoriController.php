<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function createKategori()
    {
        return view('produk.create-kategori');
    }

    public function storeKategori(Request $request)
    {
        Kategori::create ([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect(route('dataKategori'));
    }

    public function indexDataKategori(){
        $kategori = Kategori::all();
        return view('produk.kategori', compact('kategori'));
    }

    public function deleteKategori($id){
        Kategori::where('id', $id)->Delete();
        return redirect(route('dataKategori'));
    }

}
