<?php

namespace App\Http\Controllers;

use App\Models\Barang_Keluar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanBarangKeluarExport;

class LaporanBarangKeluarController extends Controller
{
    public function index()
    {
        $laporan = Barang_Keluar::with('barang.satuan')->orderBy('tanggal_keluar', 'desc')->get();

        return view('admin.laporan.laporan_barang_keluar', compact('laporan'));
    }

    // ✅ Export ke Excel
    // public function exportExcel()
    // {
    //     return Excel::download(new LaporanBarangKeluarExport, 'laporan_barang_keluar.xlsx');
    // }

    // ✅ Export ke PDF
    public function exportPdf()
    {
        $laporan = Barang_Keluar::with('barang.satuan')->orderBy('tanggal_keluar', 'desc')->get();

        $pdf = Pdf::loadView('admin.laporan.laporan_barang_keluar_pdf', compact('laporan'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan_barang_keluar.pdf');
    }
}
