<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ActionController;
//main
Route::get('/', action: [LoginController::class,'index'])->name('index');


Route::post('/login', [LoginController::class, 'login'])->name('search.process');

// Admin Dashboard Route
Route::get('/adminDashboard', [DashboardController::class, 'adminDashboard'])->name('adminDashboard');
// User Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
Route::post('/logout', function () {session()->forget('isAdmin');
    session()->flush();
    return redirect()->route('index');
})->name('logout');

//adding entry navigation route
Route::get('/new-customer', action: [CustomerController::class, 'create'])->name('newCustomer');
Route::get('/AddEmp',action: [EmployeeController::class,'newEmployee'])->name( 'newEmp');
Route::get('/add-actions', [CustomerController::class, 'addaction'])->name('addaction');

//adding entries
Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::post('/actions/store', [ActionController::class, 'store'])->name('actions.store');

//filtered views
Route::get(uri: '/search', action: [CustomerController::class, 'search'])->name( 'customers');
Route::get('/actions/{phone?}', [CustomerController::class, 'showActions'])->name('showActions');
Route::delete('/customers/{customer_ID}', [CustomerController::class, 'destroy'])->name('customers.destroy');
