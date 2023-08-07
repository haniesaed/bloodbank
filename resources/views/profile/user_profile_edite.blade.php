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

                        <form method="post" action="{{route('user.update' , ['user' => auth()->id()] ) }}" >
                            @csrf
                            @method('put')
                            <label for="name">name: </label><input type="text" id="name" name="name" value="{{$user->name}}"> <br>
                            <label for="location">location: </label><input type="text" id="location" name="location" value="{{$user->details->location}}"> <br>
                            <label for="blood_type">blood type: </label><input type="text" id="blood_type" name="blood_type" value="{{$user->details->blood_type}}"> <br>
                            <label for="phone">phone: </label><input type="text" id="blood_type" name="phone" value="{{$user->details->phone}}"> <br>
                            <input type="submit" value="update">
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
