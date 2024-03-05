<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    public function showForm()
    {
        return view('mortgage_calculator');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'property_price' => 'required|numeric|min:0',
            'down_payment' => 'required|numeric|min:0',
            'interest_rate' => 'required|numeric|min:0',
            'loan_term' => 'required|numeric|min:0',
        ]);

        $propertyPrice = $request->input('property_price');
        $downPayment = $request->input('down_payment');
        $interestRate = $request->input('interest_rate');
        $loanTerm = $request->input('loan_term');
        
        $loanAmount = $propertyPrice - $downPayment;
        $monthlyInterest = $interestRate / 12 / 100;
        $numPayments = $loanTerm * 12;

        $monthlyPayment = ($loanAmount * $monthlyInterest) / (1 - (pow(1 + $monthlyInterest, -$numPayments)));

        // Format the currency
        $currencyFormatter = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
        $formattedMonthlyPayment = $currencyFormatter->formatCurrency($monthlyPayment, 'USD');

        return view('mortgage_result', compact('formattedMonthlyPayment'));
    }
}
