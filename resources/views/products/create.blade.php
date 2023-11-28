@extends('layouts.main')
@section('title', 'Tambah Produk')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"> TAMBAH PRODUK</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambahkan Produk</h3>
                </div>
                <form method="POST" action="{{ route('products.createForm') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="product_name">Nama Produk</label>
                            <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Kategori Produk:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option disabled selected value>Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['category_name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Kode Produk:</label>
                            <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Kode produk" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi:</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Deskripsi Produk" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga:</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Harga" required>
                        </div>
                        <div class="form-group">
                            <label for="discount_amount">Diskon (opsional):</label>
                            <input type="number" name="discount_amount" id="discount_amount" class="form-control" placeholder="Diskon" min="0">
                        </div>
                        <div class="form-group">
                            <label for="stock">Stok:</label>
                            <input type="number" name="stock" id="stock" class="form-control" placeholder="Stok" required min="0">
                        </div>
                        <div class="form-group">
                            <label for="product_image">Product Image</label>
                            <input type="file" class="form-control-file" id="product_image" name="product_image[]" multiple>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
