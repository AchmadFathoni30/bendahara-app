<?php

namespace App\Http\Controllers\Admin\Pemasukan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UangMasukController extends Controller
{
    public function viewUangMasuk()
    {
        return view('Pemasukan.UangMasuk');
    }
}
