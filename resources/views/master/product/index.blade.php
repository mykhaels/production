@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master Produk</h1>
</div>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode - Nama Produk</th>
            <th scope="col">Kategori Produk</th>
            <th scope="col">Tipe Produk</th>
            <th scope="col">Status Produk</th>
            <th scope="col">Lihat Detail</th>
            <th scope="col">Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->code }} - {{ $item->name }}</td>
                <td>{{ $item->productCategory->product_category }}</td>
                @if ($item->product_type==1)
                <td>Barang Jadi</td>
                @elseif ($item->product_type==2)
                <td>Bahan Baku</td>
                @else
                <td>Pendukung</td>
                @endif

                @if ($item->status==1)
                    <td>Aktif</td>
                @else
                    <td>Tidak Aktif</td>
                @endif
                <td><a class="btn btn-success" href="product/{{ $item->id }}">Lihat Detail</a></td>
            </tr>
        @endforeach
        <tr>
            <td>{{ $products->links() }}</td>
        </tr>
    </tbody>
</table>

<footer class="fixed-bottom row">
    <div class="col-md-2 ml-4"></div>
    <div class="col-10 row bg-dark  py-1">
        <div class="col-2">
            <button class="btn btn-primary">Kembali</button>
        </div>
        <div class="col-9 text-right">
            <a class="btn btn-primary" href="/product/create">Buat Baru</a>
        </div>
    </div>
</footer>
<script>
    makeActive("#master-produk");
</script>
@endsection

