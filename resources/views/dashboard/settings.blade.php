<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>

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

    .form-container input[type="password"] {
        width: 95%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .form-container button[type="submit"] {
        padding: 10px 20px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    .form-container button[type="submit"]:hover {
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

    .input-error {
        text-align: center;
        color: red;
        font-size: 12px;
    }

    textarea {
        width: 95%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>

</head>
<body style="background-color: grey;">
    @extends('dashboard')

    @section('dashboard-content')
        <h1>Settings</h1>
        
        <h2>Change Password</h2>
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" id="current_password">
            <br>
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" id="new_password">
            <br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password">
            <br>
            <button type="submit">Change Password</button>
        </form>
    @endsection
</body>
</html>
