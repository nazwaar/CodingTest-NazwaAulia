<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'kategori_id',
        'stok',
        'tanggal_ditambah',
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class);
    }

}
