@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi Pengeluaran Bahan Produksi</h1>
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
            <th scope="col">No. Pengeluaran</th>
            <th scope="col">Tanggal Pengeluaran</th>
            <th scope="col">Tipe Produk</th>
            <th scope="col">Tipe Pengeluaran</th>
            <th scope="col">No. Permintaan Produksi</th>
            <th scope="col">Lihat Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($deliveryNotes as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->code }}</td>
                <td>{{ $item->transaction_date }}</td>
                @if ($item->product_type==1)
                <td>Barang Jadi</td>
                @elseif ($item->product_type==2)
                <td>Bahan Baku</td>
                @else
                <td>Pendukung</td>
                @endif
                <td>{{ $item->type }}</td>
                <td>{{ $item->material_request_code }}</td>
                <td><a class="btn btn-success" href="product/{{ $item->id }}">Lihat Detail</a></td>
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
        <a class="btn btn-primary" href="/product/create">Buat Baru</a>
    </div>
</footer>
<script>
    makeActive("#delivery_note");
</script>
@endsection

