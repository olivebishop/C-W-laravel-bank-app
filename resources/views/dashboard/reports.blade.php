<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        h1 {
            margin-top: 0;
            color: #000;
            margin-left: 10px;
        }

        h4 {
            margin-top: 0;
            color: #666;
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
    </style>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    @extends('dashboard')

    @section('dashboard-content')
        <h1>Reports</h1><br>
        <h4>Applied Loans</h4>
        @if (Session::has('success'))
            <div class="success-message">
                {{Session::get('success')}}
            </div>
        @endif
        <table class="table">
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
                            <button class="edit-btn" data-bs-toggle="modal" data-bs-target="#editModal{{$loan->id}}">Edit</button>
                            <form action="{{ route('loan.delete', $loan->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirmDelete();">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit pop-up Modal -->
                    <div class="modal fade" id="editModal{{$loan->id}}" tabindex="-1" aria-labelledby="editModal{{$loan->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModal{{$loan->id}}Label">Edit Loan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('loan.update', $loan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="phone">Phone No</label>
                                            <input type="text" name="phone" id="phone" value="{{$loan->phone}}">
                                        </div>
                                        <div class="mb-3 ">
                                            <label for="purpose">Purpose</label>
                                            <input type="text" name="purpose" id="purpose" value="{{$loan->purpose}}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="amount">Amount</label>
                                            <input type="text" name="amount" id="amount" value="{{$loan->amount}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this loan record?");
            }
        </script>
    @endsection
</body>
</html>
