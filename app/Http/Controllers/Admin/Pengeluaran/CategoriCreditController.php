<?php

namespace App\Http\Controllers\Admin\Pengeluaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCredit;

class CategoriCreditController extends Controller
{
    public function viewCategory()
    {
        $data = CategoryCredit::all();
        return view('Pengeluaran.Category', ['data' => $data]);
    }
}
