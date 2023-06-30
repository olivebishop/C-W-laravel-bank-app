<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            margin-top: 0;
            color: #000;
            margin-left: 10px;
            background-color: #f9f9f9;
        }

        h4 {
            margin-top: 0;
            color: #666;
            background-color: #f9f9f9;
            margin-left: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 20px;
        }

        table td:nth-child(4) {
            word-break: break-word;
            max-width: 350px;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        .edit-btn,
        .delete-btn {
            display: inline-block;
            padding: 6px 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .delete-btn {
            background-color: #dc3545;
            margin-left: 5px;
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
        .table-container {
            width: fit-content;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 10px;
            justify-content: center;
        }
    </style>
</head>
<body>
    @extends('dashboard')

    @section('dashboard-content')
        <h1>Reports</h1>
        <h4>Applied Loans</h4>
        @if (Session::has('success'))
            <div class="success-message">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Loan ID</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Purpose</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{$loan->id}}</td>
                        <td>{{$loan->phone}}</td>
                        <td>{{$loan->amount}}</td>
                        <td>{{$loan->purpose}}</td>
                        <td>
                            <a class="edit-btn" href="{{ route('dashboard.edit', $loan->id) }}">Edit</a>
                            <form action="{{ route('loan.delete', $loan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirmDelete();">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this loan record?");
            }
        </script>
    @endsection
</body>
</html>
