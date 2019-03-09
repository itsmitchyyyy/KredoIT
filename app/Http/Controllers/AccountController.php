<?php

namespace App\Http\Controllers;

// use App\Employee;
// use App\User;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

     public function index(){
        return view('pages.account.create');
    }

    // public function validateRequest(Request $data)
    // {
    //     return Validator::make($data->all(), [
    //         'user_type' => 'required',
    //         'email' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|min:8|confirmed',
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'first_name' => 'required|string|max:255',
    //         'phone' => 'required|phone_number|size:11'
    //     ]);
    // }

    // public function create(Request $data)
    // {
    //     $validator = validateRequest($data);
    //     if($validator->fails()){
    //         return redirect()->route('account.index')
    //             ->withErrors($validator);
    //     }

    //     $user = User::create([
    //         'user_type' => $data['user_type'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     Employee::create([
    //         'user_id' => $user->id,
    //         'employee_fname' => $data['first_name'],
    //         'employee_lname' => $data['last_name'],
    //         'employee_mname' => $data['middle_name'],
    //         'employee_address' => $data['address'],
    //         'employee_phone' => $data['phone'],
    //     ]);

    //     return $user;
    // }

}
