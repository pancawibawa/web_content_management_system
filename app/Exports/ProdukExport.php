<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProdukExport implements FromCollection, WithHeadings, WithMapping
{
    protected $search;
    protected $kategori;

    public function __construct($request)
    {
        $this->search = $request->query('search');
        $this->kategori = $request->query('search');
    }

    public function collection()
    {
        $query = Produk::query();
        if ($this->search) {
            $query->where('nama_produk', 'like', '%' . $this->search . '%')
                  ->orWhere('kategori', 'like', '%' . $this->search . '%');
        }

        if ($this->kategori) {
            $query->where('kategori', $this->kategori);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID', 'Nama Produk', 'Kategori Produk', 'Harga Barang','Harga Jual', 'Stok',
        ];
    }

    public function map($produk): array
    {
        return [
            $produk->id,
            $produk->nama_produk,
            $produk->kategori,
            $produk->harga_barang,
            $produk->harga_jual,
            $produk->stok,
            // $produk->created_at,
            // $produk->updated_at,
        ];
    }
}
