<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        button[type="submit"] {
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
        textarea {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            height: 100px;
        }
        .input-error {
            text-align: center;
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
@extends('dashboard')

@section('dashboard-content')
    @if (Session::has('success'))
        <div class="success-message">
            {{Session::get('success')}}
        </div>
    @endif
    <div class="form-container">

    <form action="{{ route('loan.update', $loan) }}" method="POST" class="form-input">
        @csrf
        @method('PUT')

        <h1>Edit Loan Request Record</h1>

        <div>
        <label for="phone">Phone No</label>
        <input type="number" name="phone" id="phone" value="{{ $loan->phone }}"><br>
        <span class="input-error">@error('phone'){{ $message }}@enderror</span>
        </div>

        <div>
        <label for="amount">Amount</label>
        <input type="number" name="amount" id="amount" value="{{ $loan->amount }}"><br>
        <span class="input-error">@error('amount'){{ $message }}@enderror</span>
        </div>

        <div>
        <label for="purpose">Purpose</label>
        <textarea name="purpose" id="purpose" placeholder="Explain the purpose of the loan.">{{ $loan->purpose }}</textarea><br>
        <span class="input-error">@error('purpose'){{ $message }}@enderror</span>
        </div>

        <button type="submit">Update</button>
    </form>
    </div>
@endsection
</body>
</html>