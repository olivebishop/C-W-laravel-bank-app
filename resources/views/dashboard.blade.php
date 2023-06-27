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
            flex-grow: 1;
            padding: 20px;
        }
    
        h1 {
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
                    <li><a href="">Apply Loan</a></li>
                    <li><a href="">Reports</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </nav>
        </div>
        <div>
            <div class="main-content">
                @yield('dashboard-content')
                @yield('message')
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
</body>
</html>
        
