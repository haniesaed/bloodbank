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

                        <form method="post" action="{{route('user.store' , ['user' => auth()->id()] ) }}" >
                            @csrf
                            <label for="location">location: </label><input type="text" id="location" name="location" placeholder="what is your location"> <br>
                            <label for="blood_type">blood type: </label><input type="text" id="blood_type" name="blood_type" value="choose your blood type"> <br>
                            <label for="blood_type">phone: </label><input type="text" id="blood_type" name="blood_type" value="enter your phone number"> <br>
                            <input type="submit" value="done">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
