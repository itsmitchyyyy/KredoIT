<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //
    public function index(){
        return view('pages.notification.notification');
    }

    public function create(Request $request){
        return Notification::create($request->except(['token']));
    }

    public function list(){
        return response()->json(Notification::where(['user_id' => Auth::user()->id])->get());
    }

    public function all(){
        return response()->json(Notification::with('user.employee')->get());
    }
}
