@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Master Kategori</h1>
</div>

<form method="post" action="/product-category/{{ $productCategory->id }}">
    @method('patch')
    @csrf
    <div class="form-group row">
        <label for="productType" class="col-sm-2 col-form-label">Tipe Produk</label>
        <div  class="col-sm-2">
            <select class="form-control" id="productType" name="product_type">
            <option value="1" @if ($productCategory->product_type == 1)
                selected
            @endif>Barang Jadi</option>
            <option value="2" @if ($productCategory->product_type == 2)
                selected
            @endif>Bahan Baku</option>
            <option value="3" @if ($productCategory->product_type == 3)
                selected
            @endif>Pendukung</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Kategori Produk</label>
        <div  class="col-sm-2">
            <input type="text" class="form-control @error('product_category') is-invalid @enderror" id="category"  name="product_category" value="{{ $productCategory->product_category }}">
            @error('product_category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

<footer class="fixed-bottom row">
    <div class="col-2 ml-md-3"></div>
    <div class="col-2">
        <button class="btn btn-primary">Kembali</button>
    </div>
    <div class="col-7 ml-md-5 text-right">
        <button type="submit" class="btn btn-primary">Simpan</a>
    </div>
</footer>

</form>
<script>
    makeActive("#master-kategori-produk");
</script>
@endsection
