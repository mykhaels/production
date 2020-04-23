@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Insert Master Kategori</h1>
</div>
<?php
Session::forget('details');
$details = Session::get('details');

?>
<form method="post" action="/product">
    @csrf
    <div class="form-group row">
        <label for="productType" class="col-sm-2 col-form-label">Tipe Produk</label>
        <div  class="col-sm-2">
            <select class="form-control" id="productType" name="product_type">
            <option value="1">Barang Jadi</option>
            <option value="2">Bahan Baku</option>
            <option value="3">Pendukung</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="category" class="col-sm-2 col-form-label">Kategori Produk</label>
        <div  class="col-sm-2">
            <input type="text" class="form-control @error('product_category') is-invalid @enderror" id="category"  name="product_category" value="{{ old('product_category') }}">
            @error('product_category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Kode Produk</label>
        <div  class="col-sm-2">
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"  name="code" value="{{ old('code') }}">
            @error('code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nama Produk</label>
        <div  class="col-sm-2">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="button" class="btn btn-primary col-md-2 offset-md-5" data-toggle="modal" data-target="#detail" float="right">
            Tambah data
        </button>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Satuan</th>
                <th scope="col">Nilai Konversi</th>
                <th scope="col">Tingkat</th>
                <th scope="col">Hapus</th>
            </tr>
        </thead>
        <tbody>
            @if (Session::has('details'))
            {{ Session::has('details') }}
                @foreach ($details as $detail)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->conversion }}</td>
                        <td>{{ $detail->level }}</td>
                        <td><a class="btn btn-danger" href="product/{{ $item->id }}">Hapus</a></td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

<footer class="fixed-bottom row">
    <div class="col-2 ml-md-3"></div>
    <div class="col-2">
        <button class="btn btn-primary">Kembali</button>
    </div>
    <div class="col-7 ml-md-5 text-right">
        <button type="submit" class="btn btn-primary">Simpan</a>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="Detail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Tambah Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="productType" class="col-sm-4 col-form-label">Satuan</label>
                    <div  class="col-sm-4">
                        <select class="form-control" id="uom" name="uom">
                        @foreach ($uoms as $uom)
                            <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-4 col-form-label">Konversi</label>
                    <div  class="col-sm-4">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="conversion"  name="conversion" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="saveDetail">Save changes</button>
            </div>
        </div>
    </div>
</div>

</form>
<script>
    makeActive("#master-produk");

    $('#saveDetail').click(function(){
        console.log("test");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:"POST",
            url:"/product/detail",
            data: {
                uom_id:$('#uom').val(),
                uom_name:$('#uom option:selected').text(),
                conversion:$('#conversion').val(),
            },
            success:function(results){
                // window.location.href="product/create";
                console.log(results);
            }
        });
});
</script>
@endsection
