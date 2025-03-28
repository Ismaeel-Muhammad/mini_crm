@extends('welcome')

@section('title', 'Login')

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

        .login-container {
            width: 350px;
            background: white;
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
            padding: 10px;
            transition: 0.3s;
        }

        .btn-custom:hover {
            background-color: #5bb984;
        }
    </style>
</head>

<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="login-container">
        <h4 class="text-center mb-3">Login</h4>
        <form method="POST" action="{{ route('search.process') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label fw-bold">Username </label>
                <input type="email" class="form-control" id="username" name="username" placeholder="Enter email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
