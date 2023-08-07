@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('a new blood Donation') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <label>
                            blood_type : {{$bloodDonation->blood_type}} <br>
                            quantity : {{$bloodDonation->quantity}} <br>
                            location : {{$bloodDonation->details->location}} <br>
                        </label>

                        <button href="{{route("user.edit" , ['user' => auth()->id()])}}">edit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
