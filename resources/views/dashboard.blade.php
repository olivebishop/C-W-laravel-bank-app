<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            background-color: #f4f4f4;
            width: 200px;
            padding: 20px;
            margin-left: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #ddd;
        }

        .main-content {
            padding: 20px;
        }

        .main-content h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('dashboard.profile') }}">Profile</a></li>
                    <li><a href="{{ route('dashboard.loans') }}">Apply Loan</a></li>
                    <li><a href="{{ route('dashboard.reports') }}">Reports</a></li>
                    <li><a href="{{ route('dashboard.settings') }}">Settings</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            @if(Request::is('dashboard'))
                <h1>Dashboard</h1>
            @endif 
            @yield('dashboard-content')
            @yield('message')
        </div>
    </div>
</body>
</html>
