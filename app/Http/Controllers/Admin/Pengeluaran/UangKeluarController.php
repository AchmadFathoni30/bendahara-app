<?php

namespace App\Http\Controllers\Admin\Pengeluaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UangKeluarController extends Controller
{
    public function index()
    {
        return view('Pengeluaran.UangKeluar');
    }

    public function fetchAllUangKeluar()
    {
        $debit = DB::table('credit')
            ->select('credit.id', 'credit.category_id', 'credit.user_id', 'credit.nominal', 'credit.credit_date', 'credit.description', 'categories_credit.id as id_category', 'categories_credit.name')
            ->join('categories_credit', 'credit.category_id', '=', 'categories_credit.id', 'LEFT')
            ->where('credit.user_id', Auth::user()->id)
            ->orderBy('credit.created_at', 'DESC');
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
                <td>' . $emp->credit_date . '</td>
                <td>
                    <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#updateModalUangKeluar">
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
