@extends('welcome')

@section('title', 'Actions & Form')

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

        .box {
            border: 2px solid var(--primary-color);
            border-radius: var(--border-radius);
            padding: 20px;
            background: white;
            box-shadow: var(--box-shadow);
        }

        .btn-custom {
            background-color: var(--primary-color);
            border: none;
            font-weight: bold;
            color: white;
            border-radius: var(--border-radius);
            padding: 10px 15px;
        }

        .btn-custom:hover {
            background-color: #5bb984;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
            font-weight: bold;
            color: white;
            border-radius: var(--border-radius);
            padding: 10px 15px;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }

        .table th, .table td {
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: var(--bg-light);
            cursor: pointer;
        }

        .tag-box {
            border: 2px solid var(--primary-color);
            border-radius: var(--border-radius);
            padding: 15px;
            background-color: #e9f7ed;
            text-align: center;
            box-shadow: var(--box-shadow);
        }

        .tag-list li {
            display: inline-block;
            background-color: var(--primary-color);
            color: white;
            padding: 8px 12px;
            border-radius: var(--border-radius);
            margin: 5px;
            font-size: 14px;
        }

        .form-label {
            font-weight: bold;
        }

        .custom-card {
            border-radius: var(--border-radius);
            background: linear-gradient(135deg, #ffffff, #f6fcf9);
            box-shadow: var(--box-shadow);
            padding: 20px;
        }
    </style>
</head>

<div class="container">
    <!-- Top Buttons (Go Back & Delete) -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('customers') }}" class="btn btn-custom">Go Back</a>

        <form action="{{ route('customers.destroy', $selectedCustomer->customer_ID) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">
                Delete Customer
            </button>
        </form>
    </div>

    <div class="row">
        <!-- Action Table -->
        <div class="col-lg-8">
            <div class="box">
                <h5 class="text-center text-success">Customer Actions</h5>
                <table class="table table-bordered table-hover">
                    <thead style="background-color: var(--primary-color); color: white;">
                        <tr>
                            <th>Date</th>
                            <th>Employee</th>
                            <th>Type</th>
                            <th>Outcome</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($actions as $action)
                        <tr>
                            <td>{{ $action->date }}</td>
                            <td>{{ $action->employee->name ?? 'Unknown' }}</td>
                            <td>{{ ucfirst($action->type) }}</td>
                            <td>{{ $action->outcome }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Customer Info & Action Form -->
        <div class="col-lg-4">
            <div class="box mb-3">
                <h5 class="text-success">Customer Info</h5>
                <p><strong>Name:</strong> {{ $selectedCustomer->name ?? 'N/A' }}</p>
                <p><strong>Phone Number:</strong> {{ $selectedCustomer->phone ?? 'N/A' }}</p>

                @if($filteredTagNames->isNotEmpty())
                    <div class="tag-box">
                        <h5 class="text-success">Tag Details</h5>
                        <ul class="tag-list list-unstyled">
                            @foreach($filteredTagNames as $tag)
                                <li>{{ ucfirst(str_replace('_', ' ', $tag)) }}</li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p>No matching tags found.</p>
                @endif
            </div>

            <!-- Action Form -->
            <div class="box custom-card">
                <h5 class="text-center text-success">Add Action</h5>
                <form action="{{ route('actions.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="emp_id" value="{{ session('userId') }}">
                    <input type="hidden" name="customer_id" value="{{ $selectedCustomer->customer_ID }}">

                    <div class="mb-3">
                        <label class="form-label">Select Action</label>
                        <select name="type" class="form-select" required>
                            <option value="">Choose...</option>
                            <option value="call">Call</option>
                            <option value="visit">Visit</option>
                            <option value="follow-up">Follow-up</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Outcome</label>
                        <input type="text" name="outcome" class="form-control" placeholder="Enter outcome..." required>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
