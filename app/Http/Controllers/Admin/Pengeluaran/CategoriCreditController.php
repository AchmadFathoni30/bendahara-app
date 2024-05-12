<?php

namespace App\Http\Controllers\Admin\Pengeluaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryCredit;
use Illuminate\Support\Facades\Auth;

class CategoriCreditController extends Controller
{
    public function index()
    {
        return view('Pengeluaran.Category');
    }

    // handle fetch all ajax request
    public function fetchAll()
    {
        $emps = CategoryCredit::all();
        $output = '';
        if ($emps->count() > 0) {
            $output .=
                '<table class="table table-striped dt-responsive nowrap w-100">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                    <td>' . $emp->id . '</td>
                    <td>' . $emp->name . '</td>
                    <td>
                        <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#updateModalCategory">
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

    public function inputCategoryCredit(Request $req)
    {
        try {
            $validasiData = $req->validate([
                'name' => 'required|max:255|string'
            ]);

            CategoryCredit::create([
                'user_id' => Auth::user()->id,
                'name' => $req->input('name')
            ]);

            return response()->json([
                'status' => 200
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to add Category',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function FormEditCategory(Request $request)
    {
        $id = $request->id;
        $temp = CategoryCredit::find($id);
        return response()->json($temp);
    }

    public function EditCategory(Request $request)
    {
        $temp = CategoryCredit::find($request->temp_id);
        $temData = [
            'user_id' => Auth::user()->id,
            'name' => $request->fname
        ];

        $temp->update($temData);

        return response()->json([
            'status' => 200
        ]);
    }

    public function HapusCategory(Request $request)
    {
        try {
            $id = $request->id;

            $category = CategoryCredit::find($id);

            if (!$category) {
                return response()->json([
                    'status' => 404,
                    'message' => 'Category not found',
                ], 404);
            }

            $category->delete();

            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to delete category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}