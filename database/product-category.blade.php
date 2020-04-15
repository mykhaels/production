@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Master Kategori</h1>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kategori Produk</th>
            <th scope="col">Tipe Produk</th>
            <th scope="col">Status Produk</th>
            <th scope="col">Aksi</th>
            <th scope="col">Hapus</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->category_product }}</td>
                <td>{{ $item->product_type }}</td>
                <td>{{ $item->status }}</td>
                <td><div class="badge badge-light">Ubah Status</div></td>
                <td><div class="badge badge-danger">Hapus</div></td>
            </tr>
        @endforeach
    </tbody>
</table>

<footer class="fixed-bottom row">
    <div class="col-2 ml-md-3"></div>
    <div class="col-2">
        <button class="btn btn-primary">Kembali</button>
    </div>
    <div class="col-7 ml-md-5 text-right">
        <button class="btn btn-primary">Buat Baru</button>
    </div>
</footer>

@endsection
