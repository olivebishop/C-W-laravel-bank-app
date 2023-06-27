<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Redirect;


class LoanController extends Controller
{
    public function store(Request $request)
{
    
    $loan = new Loan();
    $loan->username = $request->input('username');
    $loan->email = $request->input('email');
    $loan->amount = $request->input('amount');
    $loan->save();

    return redirect('dashboard/loans')->with('success', 'Application successful. Please wait for approval.');
}


}
