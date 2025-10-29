<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_Masuk;
use App\Models\Barang_Keluar;
use App\Models\Satuan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_barang' => Barang::count(),
            'total_masuk' => Barang_Masuk::count(),
            'total_keluar' => Barang_Keluar::count(),
            'total_satuan' => Satuan::count(),
            'total_user' => User::count(),
        ];

        return view('dashboard', $data);
    }
}
