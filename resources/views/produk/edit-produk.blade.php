@extends('layouts.master')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Edit Produk</h1>
  </div>

  <div class="section-body">
    <p class="section-lead"></p>
    <br>
    <form method="POST" action="{{route('updateProduk', $produk->id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="card">
            <div class="card-header">
              <h4>Form Edit Produk</h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="nama_produk" class="col-sm-3 col-form-label">Nama Produk</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi Produk</label>
                <div class="col-sm-5">
                  <textarea class="form-control" name="deskripsi" rows="5">{{$produk->deskripsi}}</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                <div class="col-sm-5">
                  <input type="integer" class="form-control" name="harga" value="{{$produk->harga}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="kategori_id" class="col-sm-3 col-form-label">Kategori</label>
                <div class="col-sm-5">
                  <select name="kategori_id" class="form-control">
                    @foreach($kategori as $kat)
                      <option value="{{ $kat->id }}" {{ $kat->id == $produk->kategori_id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                      </option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                <div class="col-sm-5">
                  <input type="integer" class="form-control" name="stok" value="{{$produk->stok}}">
                </div>
              </div>
              <div class="form-group row">
                <label for="tanggal_ditambah" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="tanggal_ditambah" value="{{$produk->tanggal_ditambah}}">
                </div>
              </div>
             
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
@endsection
