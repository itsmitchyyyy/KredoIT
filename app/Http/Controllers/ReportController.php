<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Item;
use App\RequestItem;
use App\User;
use DB;

class ReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        date_default_timezone_set('Asia/Manila');
    }

    public function index(){
        return view('pages.reports.reports');
    }

    public function borrowedReports(){
        $count = RequestItem::select(DB::raw('count(id) as `request`'), DB::raw("MONTHNAME(created_at) month"))
                    ->groupBy('month')
                    ->orderBy('month', 'desc')
                    ->get();
        return $count;
    }

    public function memberReports(){
        return response()->json(User::all());
    }

    public function totalMembers() {
        return response(User::where('user_type', '<>', 'ADMIN')->get()->count());
    }

    public function totalItems() {
        return response(Item::all()->count());
    }
    
    public function totalRequest() {
        return response(RequestItem::all()->count());
    }
}
