<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(15);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories,name,'.$request->name,
        ]);
        Category::create([
            'name'=>$request->name
        ]);
        return redirect()->route('categires.index')
            ->with('message', 'The category was successfully created');
    }

}
