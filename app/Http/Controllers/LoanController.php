<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;



class LoanController extends Controller
{
    public function store(Request $request)
    {
        

        $request->validate([
            'phone' => 'required|numeric|digits_between:10,10',
            'amount' => 'required|min:50|max:500|numeric',
            'purpose' => 'required|min:10|max:50|regex:/^[a-zA-Z\s.,!?]+$/',
        ],
         [
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must be numeric',
            'phone.digits_between' => 'Phone number must be exactly ten digits long. Use format 07xxxxxxxx or 01xxxxxxxx',
            'amount.required' => 'Loan amount is required',
            'amount.numeric' => 'Loan amount must be numeric',
            'amount.min' => 'Loan amount must be at least :min .',
            'amount.max' => 'Loan amount must not be more than :max .',
            'purpose.required' => 'Loan purpose is required',
            'purpose.min' => 'Loan purpose must be at least :min characters long.',
            'purpose.max' => 'Loan purpose must not be more than :max characters long.',
            'purpose.regex' => 'Loan purpose must only contain alphabetic characters, spaces, commas, periods, exclamation marks, and question marks.',
        ]
    );
        

        $loan = new Loan();
        $loan->user_id = Auth::user()->id;
        $loan->phone = $request->input('phone');
        $loan->amount = $request->input('amount');
        $loan->purpose = $request->input('purpose');
        $loan->save();

        return redirect('dashboard/reports')->with('success', 'Application successful. Please wait for approval.');
    }

    public function loan(){
        $user_id = auth()->id();
        $user = User::find($user_id);
        $loans = $user->loans;

        return view('dashboard.reports', compact('loans'));
    }


    public function update(Request $request, Loan $loan)
    {
        $request->validate([
            'phone' => 'required|numeric|digits_between:10,10',
            'amount' => 'required|numeric|min:50|max:500',
            'purpose' => 'required|min:10|max:50|regex:/^[a-zA-Z\s.,!?\'-]+$/',

        ], [
            'phone.required' => 'Phone number is required',
            'phone.numeric' => 'Phone number must be numeric',
            'phone.digits_between' => 'Phone number must be exactly ten digits long. Use format 07xxxxxxxx or 01xxxxxxxx',
            'amount.required' => 'Loan amount is required',
            'amount.numeric' => 'Loan amount must be numeric',
            'amount.min' => 'Loan amount must be at least :min.',
            'amount.max' => 'Loan amount must not be more than :max.',
            'purpose.required' => 'Loan purpose is required',
            'purpose.min' => 'Loan purpose must be at least :min characters long.',
            'purpose.max' => 'Loan purpose must not be more than :max characters long.',
            'purpose.regex' => 'Loan purpose must only contain alphabetic characters, spaces, commas, periods, exclamation marks, and question marks.',
        ]);

        $loan->update($request->only('phone', 'amount', 'purpose'));
        return redirect()->route('dashboard.reports')->with('success', 'Record updated successfully.');
    }

    public function destroy(Loan $loan){
        $loan->delete();
        return redirect()->route('dashboard.reports')->with('success', 'Record deleted successfully.');
    }

}
