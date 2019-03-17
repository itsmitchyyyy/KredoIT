<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestItem;
class BorrowedItemController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
        date_default_timezone_set('Asia/Manila');
    }

    public function index(){
        return view('pages.borrowed.borrowed');
    }

    public function list(){
        $requests = RequestItem::with('user', 'item')->get();
        return response()->json($requests);
    }

    public function delete(Request $request){
        RequestItem::find($request->id)->delete();
        return;
    }
}
