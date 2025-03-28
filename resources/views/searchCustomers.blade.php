@extends('welcome')

@section('title', 'Search')

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
        }

        .btn-custom {
            background-color: var(--primary-color);
            border: none;
            font-weight: bold;
            color: white;
            border-radius: var(--border-radius);
            padding: 10px 15px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #5bb984;
        }

        .table-hover tbody tr:hover {
            background-color: var(--bg-light);
            cursor: pointer;
        }

        .card {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        input.form-control {
            border-radius: var(--border-radius);
        }
    </style>
</head>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route(session('isAdmin') ? 'adminDashboard' : 'dashboard') }}" class="btn btn-custom">Go back</a>

        <!-- Search Form -->
        <form action="{{ route('showActions', ['phone' => '']) }}" method="GET" class="d-flex">
            <input type="text" name="phone" class="form-control me-2" placeholder="Enter phone number" required>
            <button type="submit" class="btn btn-custom">Search</button>
        </form>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead style="background-color: var(--primary-color); color: white;">
                    <tr>
                        <th>Customer</th>
                        <th>Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $customer)
                    <tr onclick="window.location='{{ route('showActions', ['phone' => $customer->phone]) }}'">
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
