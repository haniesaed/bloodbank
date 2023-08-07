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

                        <label>
                            name : {{$user->name}} <br>
                            email : {{$user->email}} <br>
                            location : {{$user->details->location}} <br>
                            phone : {{$user->details->phone}} <br>
                            blood type : {{$user->details->blood_type}} <br>
                        </label>

                        <button href="{{route("user.edit" , ['user' => auth()->id()])}}">edit</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
