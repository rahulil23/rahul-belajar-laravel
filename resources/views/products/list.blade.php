@extends('layouts.main')
@section('title', 'List Produk')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>List Produk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">List Produk</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                @if (count($products) > 0)
                    @foreach ($products as $data)
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card">
                                    @if ($data->image === null)
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->product_name }}</h5>
                                            <p class="card-text">Gambar tidak tersedia</p>
                                        </div>
                                    @else
                                        <img src="{{ asset(json_decode($data->image, true)[0]) }}" class="card-img-top img-default-size" alt="Product Image">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->product_name }}</h5>
                                            <p class="card-text">{{ $data->description }}</p>
                                        </div>
                                    @endif
                                    <!-- ... -->
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $data->product_name }}</h5>
                                    <p class="card-text">{{ $data->description }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Kode Produk: {{ $data->product_code }}</li>
                                    <li class="list-group-item">Kategori: {{ $data->category_name }}</li>
                                    <li class="list-group-item">Harga: Rp. {!! number_format($data->price, 0, '.', ',') !!} / {{ $data->unit }}</li>
                                    <li class="list-group-item">Stok: {{ $data->stock }}</li>
                                </ul>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated {{ \Carbon\Carbon::parse($data->updated_at)->diffForHumans() }}</small>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-12">
                        <div class="callout callout-danger">
                            <h5>Oops!</h5>
                            <p>Produk masih tidak tersedia untuk sekarang. Silahkan kembali lagi nanti.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    {{-- <div class="pagination justify-content-center mt-5">
        {{ $products->links() }}
    </div> --}}
@endsection
