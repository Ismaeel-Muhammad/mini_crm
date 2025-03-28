@extends('welcome')

@section('title', 'New Customer')

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
            max-width: 500px;
        }

        .card {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .card-header {
            background: var(--primary-color);
            color: white;
            text-align: center;
            font-weight: bold;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
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

        .form-check-input {
            border-radius: var(--border-radius);
        }
    </style>
</head>

<div class="container py-5">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">New Customer</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Phone Number Field -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Phone Number</label>
                    <input type="text" name="phone" class="form-control" required
                        pattern="\d{11}"
                        title="Phone number must be exactly 11 digits"
                        maxlength="11"
                        inputmode="numeric"
                        oninput="this.value = this.value.replace(/\D/g, '')">
                </div>

                <!-- Tags Checkbox List -->
                <div class="mb-3">
                    <label class="form-label fw-bold">Tags</label>
                    <div class="border rounded p-2 bg-light">
                        @foreach($tags as $column)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $column }}" id="tag_{{ $column }}">
                                <label class="form-check-label" for="tag_{{ $column }}">
                                    {{ str_replace('_', ' ', $column) }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Save Button -->
                <div class="text-end">
                    <button type="submit" class="btn btn-custom px-4">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
