@extends('admin.admin_dashboard')
@section('admin')
<!-- resources/views/mortgage_calculator.blade.php -->
<form method="POST" action="{{ route('mortgage.calculate') }}">
    @csrf

    <div class="form-group">
        <label for="property_price">Property Price:</label>
        <input type="number" class="form-control" id="property_price" name="property_price" required>
    </div>

    <div class="form-group">
        <label for="down_payment">Down Payment:</label>
        <input type="number" class="form-control" id="down_payment" name="down_payment" required>
    </div>

    <div class="form-group">
        <label for="interest_rate">Interest Rate:</label>
        <input type="number" class="form-control" id="interest_rate" name="interest_rate" required>
    </div>

    <div class="form-group">
        <label for="loan_term">Loan Term (in years):</label>
        <input type="number" class="form-control" id="loan_term" name="loan_term" required>
    </div>

    <button type="submit" class="btn btn-primary">Calculate Mortgage</button>
</form>

@endsection
