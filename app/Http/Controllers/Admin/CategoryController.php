<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('id', 'DESC')->simplePaginate(10);
        return view("admin.category.index", compact('data'));
    }


    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required | unique:categories,name',
            'parent_id' => 'sometimes|required|exists:categories,id',
        ]);

        $data = Category::create($validate);
        return redirect()->route('admin.category.index')->with('success', 'operation performed successfuly');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('admin.category.index')->with('success', 'operation performed successfuly');
    }
}
