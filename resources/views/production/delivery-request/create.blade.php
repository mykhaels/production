@extends('layouts/main')
@section('title','Home')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
    <h1 class="h2">Insert Permintaan Bahan Baku</h1>
</div>

<form method="post" action="/delivery-request">
    @csrf
    <div class="form-group row">
        <label for="productType" class="col-sm-2 col-form-label">Tipe Produk</label>
        <div  class="col-sm-2">
            <select class="form-control" id="productType" name="product_type">
            <option value="2">Bahan Baku</option>
            <option value="3">Pendukung</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">No Permintaan</label>
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
        <label for="transaction_date" class="col-sm-2 col-form-label">Tanggal Permintaan</label>
        <div  class="col-sm-2">
            <input type="date" class="form-control @error('transaction_date') is-invalid @enderror" id="transaction_date"  name="transaction_date" value="{{ old('transaction_date') }}">
            @error('transaction_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="transaction_date" class="col-sm-2 col-form-label">No Perintah Produksi</label>
        <div  class="col-sm-2">
            <input type="hidden" class="form-control @error('production_order_id') is-invalid @enderror" id="production_order_id"  name="production_order_id" value="{{ old('production_order_id') }}">
            <input type="input" class="form-control @error('production_order_code') is-invalid @enderror" id="production_order_code"  name="production_order_code" value="{{ old('production_order_code') }}">
            @error('production_order_code')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="button" class="btn btn-primary col-md-2 offset-md-5" id="add_row" float="right">
            Tambah data
        </button>
    </div>
    <table class="table" id="details_table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Kode-Nama Bahan</th>
                <th scope="col">Qty</th>
                <th scope="col">Satuan</th>
                <th scope="col">Hapus</th>
            </tr>
        </thead>
        <tbody>
            <tr scope="row">
                <td >
                    <div class="form-row">
                        <div class="col">
                            <input type="input" name="codes[]" class="form-control"  readonly />
                            <input type="hidden" name="products[]" class="form-control"  readonly />
                        </div>
                        <div class="col col-sm-2">
                            <button class="btn btn-primary form-control">Src</button>
                        </div>
                    </div>
                </td>
                <td><input type="number" name="quantities[]" class="form-control" value="1" /></td>
                <td>
                    <select class="form-control" id="uom" name="uoms[]">
                    @foreach ($uoms as $uom)
                        <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                    @endforeach
                    </select>
                </td>
                <td><button class="btn btn-danger" onclick="deleteRow(this)">Hapus</button></td>
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
            <button type="submit" class="btn btn-primary">Simpan</a>
        </div>
    </div>
</footer>

</form>
<script>
    makeActive("#delivery-note");

    let row =  '<tr scope="row">'
                +'<td >'
                    +'<div class="form-row">'
                        +'<div class="col">'
                            +'<input type="input" name="codes[]" class="form-control"  readonly />'
                            +'<input type="hidden" name="products[]" class="form-control"  readonly />'
                        +'</div>'
                        +'<div class="col col-sm-2">'
                            +'<button class="btn btn-primary form-control">Src</button>'
                        +'</div>'
                    +'</div>'
                +'</td>'
                +'<td><input type="number" name="quantities[]" class="form-control" value="1" /></td>'
                +'<td>'
                    +'<select class="form-control" id="uom" name="uoms[]">'
                    +'@foreach ($uoms as $uom)'
                        +'<option value="{{ $uom->id }}">{{ $uom->name }}</option>'
                    +'@endforeach'
                    +'</select>'
                +'</td>'
                +'<td><button class="btn btn-danger" onclick="deleteRow(this)">Hapus</button></td>'
            +'</tr>';

    let row_number = 1;
    $("#add_row").click(function(e){
        e.preventDefault();
        $('#details_table').append(row);
    });


    function deleteRow(e){
        $(e).parent().parent().remove();
    }

</script>
@endsection
