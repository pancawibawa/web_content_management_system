@extends('layout.app')
@section('konten')
    <div class="text-dark p-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}

            </div>
        @endif
        <h4>Daftar Produk</h4>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <form action="{{ route('produk.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control form-control-sm w-auto"
                            placeholder="Cari barang.." value="{{ $search }}">
                        {{-- <button type="submit" class="btn btn-secondary ms-2">Cari</button> --}}
                    </form>

                    <div class="d-flex align-items-center">
                        <form action="{{ route('produk.index') }}" method="GET" class="d-flex" id="kategoriForm">
                            <div class="form-group">
                                <select id="selectKategori" name="search" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                    <option value="" selected>All</option>
                                    @foreach ($kategoriList as $item)
                                        <option value="{{ $item->kategori }}"
                                            {{ request('search') == $item->kategori ? 'selected' : '' }}>
                                            {{ $item->kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>


                        <a href="{{ route('produk.export', request()->all()) }}"class="btn btn-success ms-2 btn-sm">
                            <i class="bi bi-file-earmark-spreadsheet"></i> Cetak Excel
                        </a>
                        <a href="{{ route('produk.create') }}" class="btn btn-danger ms-2 btn-sm">
                            <i class="bi bi-plus-circle"></i> Tambah Produk
                        </a>


                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table table-bordered">
                    <table class="table text-start align-middle table-striped table-hover" id="data" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Barang</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1 + ($produk->currentPage() - 1) * $produk->perPage();
                            @endphp
                            @foreach ($produk as $item)
                                <tr>
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td>{{ $nomor++ }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_produk }}"
                                            width="20">
                                    </td>
                                    <td>{{ $item->nama_produk }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ number_format($item->harga_barang) }}</td>
                                    <td>{{ number_format($item->harga_jual) }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>
                                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm"><i
                                                class="bi bi-pencil"></i></a>

                                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')"><i
                                                    class="bi bi-trash"></a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{$produk->links()}} --}}
                    {!! $produk->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
