<?php

namespace App\Http\Controllers\Admin\Pemasukan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryDebit;

class CategoriDebitController extends Controller
{
    public function index()
    {
        return view('Pemasukan.Category');
    }

    // Handle insert ajax request
    public function inputCategory(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            CategoryDebit::create($validatedData);

            return response()->json([
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create category',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    // handle fetch all ajax request
    public function fetchAll()
    {
        $emps = CategoryDebit::all();
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

    // Handle delete ajax request
    public function deleteCategory(Request $request)
    {
        try {
            $id = $request->id;

            $category = CategoryDebit::find($id);

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

    // Handle form edit category ajax request
    public function FormUpdateCategory(Request $request)
    {
        $id = $request->id;
		$emp = CategoryDebit::find($id);
		return response()->json($emp);
    }
}
