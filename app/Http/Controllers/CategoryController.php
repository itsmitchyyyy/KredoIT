<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){
        return response()->json(Category::all());
    }

    public function create(Request $request) {
        return Category::create($request->except(['token']));
    }
}
