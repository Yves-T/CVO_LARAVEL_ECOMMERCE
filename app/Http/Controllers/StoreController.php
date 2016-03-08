<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index')->with('products', Product::take(4)->orderBy('created_at', 'DESC')->get());
    }

    public function show($id)
    {
        return view('store.show')->with('product', Product::findOrFail($id));
    }

    public function category($id)
    {
        return view('store.category')
            ->with('products', Product::where('category_id', '=', $id)->paginate(6))
            ->with('category', Category::findOrFail($id));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        return view('store.search')
            ->with('products', Product::where('title', 'LIKE', '%' . $keyword . '%')->get())
            ->with('keyword', $keyword);
    }


    public function contact()
    {
        return view('store.contact');
    }
}
