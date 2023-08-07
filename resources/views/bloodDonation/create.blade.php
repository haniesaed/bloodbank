@extends('layouts.app')

@section('content')
<form  action="{{ route("bloodDonation.store") }}" method="post" >
    @csrf
    <label>
        <input type="text" placeholder="location" name = "location">
    </label>
    <label>
        <input type="text" placeholder="blood type" name = "blood_type">
    </label>
    <label>
        <input type="number" placeholder="quantity" name = "quantity">
    </label>
    <button type="submit">submit</button>
</form>
@endsection
