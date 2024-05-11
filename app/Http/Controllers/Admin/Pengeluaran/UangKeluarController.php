<?php

namespace App\Http\Controllers\Admin\Pengeluaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UangKeluarController extends Controller
{
    public function viewUangKeluar()
    {
        return view('Pengeluaran.UangKeluar');
    }
}
