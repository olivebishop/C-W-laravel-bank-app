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
        .form-container input[type="number"] {
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
        .success-message {
            background-color: green;
            color: white;
            padding: 14px;
            border-radius: 10px;
             max-width: 400px;
             margin-top: 5px;
             margin-bottom: 0;
             margin-right: auto;
             margin-left: auto;
        }
    </style>
</head>
<body>
    @extends('dashboard')

    @section('dashboard-content')
        <h1>Apply for a loan here </h1>
        @if (Session::has('success'))
            <div class="success-message">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="form-container">
            <h1>Loan Form</h1>
            <form action="{{route('apply_loan')}}" method="POST">
                @csrf
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" >
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"  >
                </div>
                <div>
                    <label for="amount">Loan Amount:</label>
                    <input type="number" id="amount" name="amount">
                <div>
                    <input type="submit" name="apply" value="Apply">
                </div>
            </form>
        </div>
    @endsection
    
</body>
</html>