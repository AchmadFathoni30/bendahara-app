<?php

namespace App\Http\Controllers\Admin\Pemasukan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Debit;
use App\Models\CategoryDebit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UangMasukController extends Controller
{
    public function viewUangMasuk()
    {
        return view('Pemasukan.UangMasuk');
    }


    public function fetchAllUangMasuk()
    {
        $debit = DB::table('debit')
            ->select('debit.id', 'debit.category_id', 'debit.user_id', 'debit.nominal', 'debit.debit_date', 'debit.description', 'categories_debit.id as id_category', 'categories_debit.name')
            ->join('categories_debit', 'debit.category_id', '=', 'categories_debit.id', 'LEFT')
            ->where('debit.user_id', Auth::user()->id)
            ->orderBy('debit.created_at', 'DESC');
        $output = '';
        if ($debit->count() > 0) {
            $output .=
                '<table class="table table-striped dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Nominal</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($debit as $emp) {
                $output .= '<tr>
                <td>' . $emp->id . '</td>
                <td>' . $emp->name . '</td>
                <td>' . $emp->nominal . '</td>
                <td>' . $emp->desciption . '</td>
                <td>' . $emp->debit_date . '</td>
                <td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#updateModalTransaksi">
                        <i class="bi-pencil-square h4"></i>
                    </a>
                    <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon">
                        <i class="bi-trash h4"></i>
                    </a>
                </td>
              </tr>';
            }
            $output .=
                '</tbody>
        </table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }
}
