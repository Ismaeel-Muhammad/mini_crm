<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Employee;

class EmployeeController extends Controller{
    public function index(){
        return view( "login");
    }
    public function newEmployee(){
        return view( "newEmp");
    }


    public function store(Request $request)
    {
        Employee::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password, // No hashing
            'isAdmin' => $request->has('is_admin') ? 1 : 0,
            'creator' => Session::get('userId'), // Use stored user ID
    ]);

    return redirect()->route('adminDashboard')->with('success', 'Employee added successfully!');
    }
}
