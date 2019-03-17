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
}
