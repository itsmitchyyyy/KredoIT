<?php

namespace App\Http\Controllers;

use App\RequestItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RequestItemController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Manila');
    }
    public function create(Request $request) {
        $itemIds = $request->quantity;
        foreach($itemIds as $index => $val){
            $request->request->add(['user_id' => Auth::user()->id]);
            $request->request->add(['item_id' => $request->items[$index]]);
            $request->request->add(['kredo_item_no' => $val]);
            $request->request->add(['request_item_serial_no' => $this->generateSerialNumber()]);
            $request->request->add(['request_date' => Carbon::now()]);
            $request->request->add(['request_return_date' => Carbon::now()->addDays(3)]);
            $request->request->add(['request_approver_id' => 1]);
            RequestItem::create($request->except(['quantity, items, token']));
        }
        return;
    }

    function generateSerialNumber(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($characters), 0, 8);
    }
}
