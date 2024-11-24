<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $produkPaginate = Produk::paginate(10);
    //     $search = $request->input('search');
    //     $kategori = $request->input('kategori');
    //     $produk = Produk::when($search, function ($query, $search) {
    //         return $query->where('nama_produk', 'like', '%' . $search . '%');
    //     })
    //         ->when($kategori, function ($query, $kategori) {
    //             return $query->where('kategori', $kategori);
    //         })
    //         ->get();

    //     $kategoriList = Kategori::all();

    //     return view('user.produk.index', compact('produk', 'kategoriList'));
    // }

    public function index(Request $request)
    {

        $search = $request->query('search');

        if (!empty($search)) {
            $dataProduk = Produk::where('produk.nama_produk', 'like', '%' . $search . '%')
                ->orWhere('produk.kategori', 'like', '%' . $search . '%')
                ->paginate(10)
                ->onEachSide(2)
                ->fragment('prd');
        } else {
            $dataProduk = Produk::paginate(10)
                ->onEachSide(2)
                ->fragment('prd');
        }

        $kategoriList = Kategori::all();
        return view('user.produk.index', compact('kategoriList'))->with([
            'produk' => $dataProduk,
            'search' => $search,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriList = Kategori::all();
        return view('user.produk.create', compact('kategoriList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required|string',
            'harga_barang' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:100',
        ], [
            'kategori.required' => 'Kategori wajib diisi.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string' => 'Nama produk tidak boleh menggunakan angka.',
            'harga_barang.required' => 'Harga barang wajib diisi.',
            'harga_barang.numeric' => 'Harga barang harus berupa angka.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.numeric' => 'Harga jual harus berupa angka.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.numeric' => 'Stok harus berupa angka.',
            'gambar.required' => 'Gambar wajib diunggah.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format jpg atau png.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 100KB.',
        ]);

        $produk = new Produk();
        $produk->kategori = $request->kategori;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_barang = $request->harga_barang;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = 'gambar-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $produk->gambar = $filename;
        }

        $produk->save();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        $kategoriList = Kategori::all();
        return view('user.produk.edit', compact('produk', 'kategoriList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_produk' => 'required|string',
            'harga_barang' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:100',
        ], [
            'kategori.required' => 'Kategori wajib diisi.',
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string' => 'Nama produk tidak boleh menggunakan angka.',
            'harga_barang.required' => 'Harga barang wajib diisi.',
            'harga_barang.numeric' => 'Harga barang harus berupa angka.',
            'harga_jual.required' => 'Harga jual wajib diisi.',
            'harga_jual.numeric' => 'Harga jual harus berupa angka.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.numeric' => 'Stok harus berupa angka.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berupa file dengan format jpg atau png.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 100KB.',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->kategori = $request->kategori;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_barang = $request->harga_barang;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && file_exists(public_path('images/' . $produk->gambar))) {
                unlink(public_path('images/' . $produk->gambar));
            }
            $file = $request->file('gambar');
            $filename = 'gambar-' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $produk->gambar = $filename;
        }

        $produk->save();
        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            if (file_exists(public_path('images/' . $produk->gambar))) {
                unlink(public_path('images/' . $produk->gambar));
            }
            $produk->delete();


            return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
        } else {
            return redirect()->route('produk.index')->with('error', 'Produk tidak ditemukan.');
        }
    }


    public function export(Request $request)
    {
        // Ekspor produk sesuai dengan pencarian dan kategori yang dipilih
        return Excel::download(new ProdukExport($request), 'produk.xlsx');
    }
}
