<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());
    }

    public function store(SaveCategoryRequest $request)
    {
        Category::create($request->only('name'));
        return redirect(route('admin.categories.index'))->with('message', 'Category created!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect(route('admin.categories.index'))->with('message', 'Category deleted!');
    }
}
