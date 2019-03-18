<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AccountController extends Controller
{
     public function index(){
        return view('pages.account.create');
    }

    public function list(){
        $users = User::with('employee')->get();
        return response()->json($users);
    }

    public function get(Request $request){
        return User::with('employee')->where('id', $request->id)->get();
    }

    public function validateRequest(Request $data)
    {
        return Validator::make($data->all(), [
            'user_type' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'phone' => 'required|phone_number|size:11'
        ]);
    }

    public function create(Request $data)
    {
        $validator = $this->validateRequest($data);
        if($validator->fails()){
            return redirect()->route('account.index')
                ->withErrors($validator);
        }

        $user = User::create([
            'user_type' => $data['user_type'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'user_status' => $data['user_status']
        ]);

        Employee::create([
            'user_id' => $user->id,
            'employee_fname' => $data['first_name'],
            'employee_lname' => $data['last_name'],
            'employee_mname' => $data['middle_name'],
            'employee_address' => $data['address'],
            'employee_phone' => $data['phone'],
        ]);

        return $user;
    }

    public function updatePassword(Request $request){
        if($request->password == $request->confirm_password) {
            $password = Hash::make($request->password);
            User::find($request->id)->update(['password' => $password]);
            return;
        }
    }

    public function delete(Request $request){
        User::find($request->id)->delete();
        Employee::find($request->emp_id)->delete();
        return;
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->update($request->except(['token']));
        $user->employee()->update([
            'employee_fname' => $request->employee_fname,
            'employee_lname' => $request->employee_lname,
            'employee_mname' => $request->employee_mname,
            'employee_address' => $request->employee_address,
            'employee_phone' => $request->employee_phone,
        ]);
        return;
    }

}
