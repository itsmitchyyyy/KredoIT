<?php

namespace App\Http\Controllers;

use App\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    //
    public function list(){
        $purchaseRequest = PurchaseRequest::with('requests.item', 'user.employee', 'requests.approver.employee')->get();
        return response()->json($purchaseRequest);
    }

    public function borrowedList(Request $request){
        $purchaseRequestList = PurchaseRequest::with('requests.item', 'requests.approver.employee')
            ->where(['user_id' => $request->id])
            ->get();
        return response()->json($purchaseRequestList);
    }

    public function update(Request $request){
        PurchaseRequest::find($request->id)->update($request->except(['token']));
        return;
    }
}
