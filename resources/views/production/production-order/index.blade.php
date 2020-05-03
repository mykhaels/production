@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi Perintah Produksi</h1>
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
            <th scope="col">No. Perintah Produksi</th>
            <th scope="col">Tanggal Perintah Produksi</th>
            <th scope="col">Tipe Produksi</th>
            <th scope="col">Status Produksi</th>
            <th scope="col">Lihat Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productionOrders as $item)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->code }}</td>
                <td>{{ $item->transaction_date }}</td>
                @if ($item->production_type==1)
                <td>Barang Jadi</td>
                @else
                <td>Bahan Baku</td>
                @endif
                <td>{{ $item->status }}</td>
                <td><a class="btn btn-success" href="production-order/{{ $item->id }}">Lihat Detail</a></td>
            </tr>
        @endforeach
    </tbody>
    <tr>
        <td>{{ $productionOrders->links() }}</td>
    </tr>
</table>

<footer class="fixed-bottom row">
    <div class="col-2 ml-md-3"></div>
    <div class="col-2">
        <button class="btn btn-primary">Kembali</button>
    </div>
    <div class="col-7 ml-md-5 text-right">
        <a class="btn btn-primary" href="/production-order/create">Buat Baru</a>
    </div>
</footer>
<script>
    makeActive("#production-order");
</script>
@endsection

