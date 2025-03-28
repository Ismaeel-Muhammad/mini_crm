@extends('welcome')

@section('title', 'Admin Dashboard')

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

        .header-box {
            background: var(--primary-color);
            color: white;
            padding: 15px;
            border-radius: var(--border-radius);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--box-shadow);
        }

        .card {
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

        .stat-box {
            background: #e9f7ed;
            padding: 15px;
            border-radius: var(--border-radius);
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: var(--primary-color);
        }
    </style>
</head>

<div class="container py-4">
    <!-- Header Section -->
    <div class="header-box mb-4">
        <h4 class="mb-0">Welcome, {{ session('name') ?? 'Guest' }}</h4>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-custom">Logout</button>
        </form>
    </div>

    <div class="row g-4">
        <!-- Activity Log -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">Activity Log</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--primary-color); color: white;">
                                <tr>
                                    <th>Customer</th>
                                    <th>Action</th>
                                    <th>Employee</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($actions as $activity)
                                <tr>
                                    <td>{{ $activity->customer->name ?? 'Unknown' }}</td>
                                    <td>{{ ucfirst($activity->type) }}</td>
                                    <td>{{ $activity->employee->name ?? 'Unknown' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Widgets -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body d-flex align-items-center">
                    <a href="{{ route('customers') }}" class="btn btn-custom w-100">Search</a>
                </div>
            </div>
            <div class="stat-box mb-4">
                <h6>Total Actions Today</h6>
                <div class="stat-number">
                    {{ $actions->where('date', '>=', now()->startOfDay())->count() }}
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body text-center">
                    <a href="{{ route('newCustomer') }}" class="btn btn-custom w-100">Add Customer</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <a href="{{ route('newEmp') }}" class="btn btn-custom w-100">Add Employee</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
