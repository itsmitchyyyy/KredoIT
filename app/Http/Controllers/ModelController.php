<?php

namespace App\Http\Controllers;

use App\ItemModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{

    public function index(){
        return response()->json(ItemModel::all());
    }

    public function create(Request $request){
        return ItemModel::create($request->except(['token']));
    }
}
