@extends('layout.main')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">DATA PRODUK</h1>
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
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('products.create') }}" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                        <div class="float-right">
                            <form id="search" method="get" action="{{ url('products') }}">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari Produk" value="{{ $search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                    <a href="{{ url('products') }}" class="btn btn-secondary"><i class="fas fa-sync"></i></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Kode produk</th>
                                    <th>deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $row)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $row['product_name'] }}</td>
                                    <td>{{ $row['category_id'] }}</td>
                                    <td>{{ $row['product_code'] }}</td>
                                    <td>{{ $row['description'] }}</td>
                                    <td>{{ $row['price'] }}</td>
                                    <td>
                                        @if ($row['image'] === null)
                                            Gambar tidak tersedia
                                        @else
                                            @foreach (json_decode($row['image'], true) as $imagePath)
                                                <img src="{{ $imagePath }}" alt="Product Image" width="100"><br>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $row['id']) }}" class="btn btn-success">Ubah</a>
                                        <form action="{{ route('products.delete', $row['id']) }}" method="post" style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data produk.</td>
                                </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Kode produk</th>
                                    <th>deskripsi</th>
                                    <th>Harga</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                {{ $products->links() }}
                            </ul>
                        </div>
                    </div>
                    <!--card body-->
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection