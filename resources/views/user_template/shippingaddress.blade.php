@extends('user_template.layouts.template')
@section('main-content')
<br>
<h3>Provide Your Shipping Infomation</h3>
<div style="padding: 50px">
<form action="{{ route('addshippingaddress') }}" method="POST">
    @csrf
    <div class="mb-3 row">
        <label for="phone_number">Phone Number</label>
        <input type="text" class="form-control" name="phone_number">
    </div>
    <div class="mb-3 row">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address">
    </div>
    <div class="mb-3 row">
        <label for="postal_code">Postal-code</label>
        <input type="text" class="form-control" name="postal_code">
    </div>
    <input type="submit" value="Next" class="btn btn-primary">
</form>
</div>
@endsection