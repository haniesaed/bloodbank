@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('home page') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        hello {{auth()->user()->name}} in this website you can donate blood for helping another people
                        and request blood if you need
                          <h3>about Us:</h3>

                        do not forget to give us a feedback
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
