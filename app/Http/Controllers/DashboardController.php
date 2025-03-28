<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Action;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $actions = Session::get('actions', Action::all()); // Retrieve actions from session
        return view('adminDashboard', compact('actions'));
    }

    public function userDashboard()
    {
        $actions = Session::get('actions', Action::all()); // Retrieve actions from session
        return view('dashboard', compact('actions'));
    }
}
