<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Customer;
use App\Models\Tag;
use App\Models\Action;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class CustomerController extends Controller
{
    // Create a new customer form with available tags
    public function create()
    {
        $columns = Schema::getColumnListing('tags'); // Get all column names
        $filteredColumns = array_slice($columns, 1); // Remove first column (id)
        return view('newCustomer', ['tags' => $filteredColumns]);
    }


    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:15|unique:customers,phone',
        'tags' => 'array', // Expecting an array of selected checkboxes
    ]);

    $selectedTags = $validatedData['tags'] ?? [];
    $allTagColumns = Schema::getColumnListing('tags');
    array_shift($allTagColumns); // Remove 'id' column

    // Convert selected checkboxes to binary (1 for checked, 0 for unchecked)
    $binaryTags = [];
    foreach ($allTagColumns as $column) {
        $binaryTags[$column] = in_array($column, $selectedTags) ? 1 : 0;
    }

    // Search for matching tag row
    $matchingTag = Tag::where($binaryTags)->first();

    if (!$matchingTag) {
        return redirect()->back()->with('error', 'No matching tag set found.');
    }

    // Get the logged-in employee's ID from session
    $emp_id = Session::get('userId');

    // Insert new customer record
    $customer = Customer::create([
        'name' => $validatedData['name'],
        'phone' => $validatedData['phone'],
        'emp_id' => $emp_id,
        'tag_id' => $matchingTag->id,
    ]);

    return redirect()->route(session('isAdmin') ? 'adminDashboard' : 'dashboard')
        ->with('success', 'Customer added successfully.');
    }

    // Search for customers
    public function search()
    {
        $customers = Customer::all();
        return view('searchCustomers', ['customers' => $customers]);
    }

    // Show customer details along with actions and tag info
    public function showActions(Request $request, $phone = null)
    {
        $queryPhone = $request->input('phone') ?? $phone;

        if (!$queryPhone) {
            return redirect()->back()->with('error', 'Please enter a phone number');
        }

        $selectedCustomer = Customer::where('phone', $queryPhone)->first();

        if (!$selectedCustomer) {
            return redirect()->back()->with('error', 'Customer not found');
        }

        $actions = Action::where('customer_ID', $selectedCustomer->customer_ID)->get();

        // Fetch only the column names where value = 1 from the tags table
        $tagData = Tag::where('id', $selectedCustomer->tag_id)->first();

        if ($tagData) {
            $filteredTagNames = collect($tagData->getAttributes())->filter(function ($value, $key) {
                return $value == 1 && $key !== 'id';
            })->keys(); // Get only column names
        } else {
            $filteredTagNames = collect(); // Empty collection if no tag found
        }

        return view('customerProfile', compact('selectedCustomer', 'actions', 'filteredTagNames'));
    }
    public function destroy($customer_ID)
    {
        $customer = Customer::where('customer_ID', $customer_ID)->firstOrFail();
        $customer->delete();

        return redirect()->route('customers')->with('success', 'Customer deleted successfully.');
    }

}
