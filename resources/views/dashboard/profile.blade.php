<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .success {
            background-color: green;
            color: white;
            width: 80%;
            padding: 14px 28px;
            border-radius: 10px;
        }

        .form-container {
            width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            justify-content: center;
        }

        .form-container h1 {
            margin-top: 0;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .form-container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
@extends('dashboard')
    @section('message')
        @if (session('success'))
            <div class="success">
                {{session('success')}}
            </div>
        @endif
    @endsection
    @section('dashboard-content')

    <h1>User Profile</h1>
        <div class="form-container">
            <h1>Basic Info.</h1>
            <form action="{{route('profile.update')}}" method="POST">
                @csrf
                @method('patch')
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="{{$user->username}}">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="{{$user->email}}">
                </div>
                <div>
                    <input type="submit" name="update" value="Update">
                </div>
            </form>
        </div>

        <div class="form-container">
            <h1>More info.</h1>
            <!-- Add your additional fields for more info here -->
        </div>
    @endsection
</body>
</html>
