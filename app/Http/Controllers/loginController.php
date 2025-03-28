<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Action;
use App\Models\Employee;

class LoginController extends Controller
{
    public function index(){
        return view( "login");
    }


    public function login(Request $request)
    {
        $user = Employee::where('username', $request->username)
                    ->where('password', $request->password) // Direct comparison since it's not hashed
                    ->first();

        if ($user) {
            Session::put('isAdmin', $user->isAdmin); // Store admin flag
            Session::put('userId', $user->id); // Store user ID
            Session::put('actions', Action::all());  // Store actions in session
            Session::put('name', $user->name);
            session::save();

            if ($user->isAdmin == 1) {
                return redirect()->route('adminDashboard')->with(['employee' => $user]);
            } else {
                return redirect()->route('dashboard')->with(['employee' => $user]);
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials or access denied.');
    }
}




