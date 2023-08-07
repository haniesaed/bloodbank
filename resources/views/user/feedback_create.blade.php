@extends('layouts.app')

@section('content')
    <form  action="{{ route("feedback.store") }}" method="post" >
        @csrf

        <label>
            <input type="text" placeholder="Enter your feedback" name = "description">
        </label>
        <label>
            <input type="number" placeholder="Enter your rate" name = "rate">
        </label>
        <button type="submit">submit</button>
    </form>
@endsection
