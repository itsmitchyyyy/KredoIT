<?php

namespace App\Http\Controllers;

use App\RequestItem;
use App\PurchaseRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RequestItemController extends Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Manila');
    }

    public function index(){
        return view('pages.request.request');
    }

    public function create(Request $request) {
        $itemIds = $request->quantity;
        foreach($itemIds as $index => $val){
            $request->request->add(['user_id' => Auth::user()->id]);
            $request->request->add(['item_id' => $request->items[$index]]);
            $request->request->add(['kredo_item_no' => $val]);
            $request->request->add(['request_item_serial_no' => $this->generateSerialNumber()]);
            $request->request->add(['request_date' => Carbon::now()]);
            RequestItem::create($request->except(['quantity, items, token']));
        }
        return;
    }

    public function list(){
        $requests = RequestItem::with('user.employee', 'item')->get();
        return response()->json($requests);
    }

    public function update(Request $request){
        $request->request->add(['request_approver_id' => Auth::user()->id]);
        $requestItem = RequestItem::find($request->id);
        $requestItem->update($request->except(['token', 'id']));
        if($request->request_status == 'approved') {
            PurchaseRequest::create([
                'user_id' => $requestItem->user_id,
                'request_id' => $requestItem->id]);
            }
        return $request;
    }

    function generateSerialNumber(){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        return substr(str_shuffle($characters), 0, 8);
    }
}
