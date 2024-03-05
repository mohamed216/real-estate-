<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MortgageController extends Controller
{
    public function index()
    {
        return view('mortgage');
    }

    public function calculate(Request $request)
    {
        $principal = $request->input('principal');
        $interestRate = $request->input('interest_rate');
        $loanTerm = $request->input('loan_term');

        $monthlyInterestRate = $interestRate / 100 / 12;
        $loanTermMonths = $loanTerm * 12;
        $monthlyPayment = ($principal * $monthlyInterestRate) / (1 - pow(1 + $monthlyInterestRate, -$loanTermMonths));

        return response()->json([
            'monthlyPayment' => round($monthlyPayment, 2),
        ]);
    }



}
