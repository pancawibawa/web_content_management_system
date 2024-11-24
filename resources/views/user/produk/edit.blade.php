@extends('layout.app')
@section('konten')
    <div class="text-dark p-4">
        <h4>Daftar Produk<i class="bi bi-chevron-right"></i>Edit Produk</h4>

        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategoriList as $kategori)
                            <option value="{{ $kategori->kategori }}" {{ (old('kategori', $produk->kategori) == $kategori->kategori) ? 'selected' : '' }}>{{ $kategori->kategori }}</option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-8">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" placeholder="Masukan Nama Barang">
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="harga_barang" class="form-label">Harga Barang</label>
                    <input type="number" class="form-control @error('harga_barang') is-invalid @enderror" id="harga_barang" name="harga_barang" value="{{ old('harga_barang', $produk->harga_barang) }}" placeholder="Masukan Harga Barang" required>
                    @error('harga_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $produk->harga_jual) }}" placeholder="Masukan Harga Jual" required>
                    @error('harga_jual')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" placeholder="Masukan Stok Barang" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" accept="image/*" onchange="previewImage(event)">
                <img id="preview" src="{{ asset('images/' . $produk->gambar) }}" alt="Image preview" style="width: 100px; margin-top: 10px;">
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-2">Kembali</a>
            </div>
        </form>
    </div>
@endsection
