<?php

namespace App\Http\Controllers;

use App\Models\Barang_Masuk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanBarangMasukExport;

class LaporanBarangMasukController extends Controller
{
    public function index()
    {
        $laporan = Barang_Masuk::with('barang.satuan')->orderBy('tanggal_masuk', 'desc')->get();

        return view('admin.laporan.laporan_barang_masuk', compact('laporan'));
    }

    // ✅ Export ke Excel
    // public function exportExcel()
    // {
    //     return Excel::download(new LaporanBarangMasukExport, 'laporan_barang_masuk.xlsx');
    // }

    // ✅ Export ke PDF
    // public function exportPdf()
    // {
    //     $laporan = Barang_Masuk::with('barang.satuan')->orderBy('tanggal_masuk', 'desc')->get();

    //     $pdf = Pdf::loadView('admin.laporan.laporan_barang_masuk_pdf', compact('laporan'))
    //         ->setPaper('a4', 'landscape');

    //     return $pdf->download('laporan_barang_masuk.pdf');
    // }
}
