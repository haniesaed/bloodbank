@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Details') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="post" action="{{route('donation.update' , ['donation' => $bloodDonation->id  ]) }}" >
                            @csrf
                            @method('put')
                            <label for="name">Blood Type: </label><input type="text" id="name" name="blood_type" value="{{$bloodDonation->blood_type}}"> <br>
                            <label for="location">location: </label><input type="text" id="location" name="location" value="{{$bloodDonation->location}}"> <br>
                            <label for="blood_type">Quantity: </label><input type="text" id="blood_type" name="Quantity" value="{{$bloodDonation->quantity}}"> <br>
                            <input type="submit" value="update">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
