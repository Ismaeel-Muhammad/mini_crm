@extends('welcome')

@section('title', 'New Employee')

@section('content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #6fcf97; /* Mint Green */
            --bg-light: #f0f8f4;
            --text-dark: #333;
            --border-radius: 15px;
            --box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--bg-light);
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            max-width: 600px;
        }

        .card {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .form-control {
            border-radius: var(--border-radius);
        }

        .btn-custom {
            background-color: var(--primary-color);
            border: none;
            font-weight: bold;
            color: white;
            border-radius: var(--border-radius);
            padding: 10px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #5bb984;
        }
    </style>
</head>

<div class="container py-4">
    <div class="card p-4">
        <h4 class="text-center mb-4">New Employee</h4>
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <!-- Name & Username Fields -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Username (Email)</label>
                    <input type="email" class="form-control" name="username" placeholder="Enter email" required>
                </div>
            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
            </div>

            <!-- Admin Checkbox -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_admin" id="adminCheck" value="1">
                <label class="form-check-label" for="adminCheck">Admin</label>
            </div>

            <!-- Save Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-custom px-4">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
