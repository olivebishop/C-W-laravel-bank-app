<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .input-form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; 
            justify-content: center;
        }
        
        .input-form input {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        
        .input-form input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            margin-left: 50%;
            margin-right: 50%;
            transform: translate( -50%);

        }
        
        .input-form input[type="submit"]:hover {
            background-color: #45a049;
        }
        .error-message {
            background-color: red;
            color: white;
            padding: 14px;
            border-radius: 10px;
             max-width: 400px;
             margin-top: 5px;
             margin-bottom: 0;
             margin-right: auto;
             margin-left: auto;
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

@include('nav')

    @if (Session::has('error'))
        <div class="error-message">
            {{Session::get('error')}}
        </div>
    @endif

    @if (Session::has('success'))
        <div class="success-message">
            {{Session::get('success')}}
        </div>
    @endif
    

    <div class="input-form">
        <h1>Login</h1>
        <form action="/process_login" method="POST">
            @csrf
            <div><input type="text" name="username" placeholder="Enter username"></div>
            <div><input type="password" name="password" placeholder="Enter password"></div>
            <div><input type="submit" name="login" value="Login"></div>
        </form>
    </div>
</body>
</html>