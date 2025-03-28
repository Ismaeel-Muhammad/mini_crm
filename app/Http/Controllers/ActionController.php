<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Action;

class ActionController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'type' => 'required|string',
        'outcome' => 'required|string',
        'emp_id' => 'required|integer',
        'customer_id' => 'required|integer',
    ]);

    Action::create([
        'date' => now(),
        'emp_id' => $request->emp_id,
        'customer_id' => $request->customer_id,
        'type' => strtolower($request->type),
        'outcome' => $request->outcome,
    ]);

    return redirect()->back()->with('success', 'Action added successfully!');
}

}
