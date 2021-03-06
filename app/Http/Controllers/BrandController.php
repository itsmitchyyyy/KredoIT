<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return response()->json(Brand::all());
    }

    public function create(Request $request){
        return Brand::create($request->except(['token']));
    }
}
