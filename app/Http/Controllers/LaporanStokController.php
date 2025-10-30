<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanStokExport;

class LaporanStokController extends Controller
{
    public function index()
    {
        // Ambil semua barang beserta relasinya
        $laporan = Barang::with(['satuan', 'barangMasuk', 'barangKeluar'])->get();

        foreach ($laporan as $item) {
            // Ambil total masuk & keluar
            $totalMasuk = $item->barangMasuk->sum('jumlah_masuk');
            $totalKeluar = $item->barangKeluar->sum('jumlah_keluar');

            // Ambil stok awal dari transaksi masuk pertama
            $barangMasukPertama = $item->barangMasuk->sortBy('tanggal_masuk')->first();
            $stokAwal = $barangMasukPertama ? $barangMasukPertama->jumlah_masuk : 0;

            // Simpan ke variabel untuk ditampilkan
            $item->stok_awal = $stokAwal;
            $item->totalMasuk = $totalMasuk;
            $item->totalKeluar = $totalKeluar;
            $item->stok_akhir = $totalMasuk - $totalKeluar;
            $item->periode = now()->format('Y-m');
        }

        return view('admin.laporan.laporan_stok', compact('laporan'));
    }

    // ✅ Export ke PDF
    public function exportPdf()
    {
        $laporan = Barang::with(['satuan', 'barangMasuk', 'barangKeluar'])->get();

        foreach ($laporan as $item) {
            $totalMasuk = $item->barangMasuk->sum('jumlah_masuk');
            $totalKeluar = $item->barangKeluar->sum('jumlah_keluar');
            $barangMasukPertama = $item->barangMasuk->sortBy('tanggal_masuk')->first();
            $stokAwal = $barangMasukPertama ? $barangMasukPertama->jumlah_masuk : 0;

            $item->stok_awal = $stokAwal;
            $item->totalMasuk = $totalMasuk;
            $item->totalKeluar = $totalKeluar;
            $item->stok_akhir = $stokAwal + $totalMasuk - $totalKeluar;
            $item->periode = now()->format('Y-m');
        }

        $pdf = Pdf::loadView('admin.laporan.laporan_stok_pdf', compact('laporan'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_stok.pdf');
    }
}
