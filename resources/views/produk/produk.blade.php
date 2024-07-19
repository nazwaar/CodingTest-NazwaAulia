@extends('layouts.master')
@section('content')

<section class="section">
    <div class="section-header">
        <h3 class="section-title">Produk Collection
            <a href="{{ route('createProduk') }}" title="Tambah Data" style="float: right; margin-right: 2%"
                class="btn btn-primary mr-1">Tambah Produk</a>
        </h3>
       
         <!-- Form Pencarian -->
    <form method="GET" action="{{ route('dataProduk') }}" class="mb-4">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Cari produk..." value="{{ request('search') }}">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit">Cari</button>
        </div>
      </div>
    </form>
    
        <table id="data-admin" class="table table-striped table-bordered table-md" style="width: 100%; margin-top:5%; padding:2%;" cellspacing="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Tanggal Ditambahkan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($produk as $bk)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$bk->nama_produk}}</td>
                    <td>{{$bk->deskripsi}}</td>
                    <td>{{$bk->harga}}</td>
                    <td>
                        {{$bk->kategori->nama_kategori}}
                    </td>
                    <td>{{$bk->stok}}</td>
                    <td>{{$bk->tanggal_ditambah}}</td>
                    <td>
                        <a href="{{ route('editProduk', ['id' => $bk->id]) }}" class="btn btn-primary mr-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('deleteProduk', ['id' => $bk->id]) }}" class="btn btn-danger mr-1">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<script src="{{ asset('assets/admin/dataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/admin/dataTables/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#data-admin').DataTable({
            "iDisplayLength": 25
        });
    });

</script>

@endsection
