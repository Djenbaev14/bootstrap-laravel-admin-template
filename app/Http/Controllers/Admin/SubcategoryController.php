<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories = Subcategory::orderBy('id', 'DESC')->paginate(15);
        return view('admin.subcategory.index', compact('subcategories'));  
    }  
}
