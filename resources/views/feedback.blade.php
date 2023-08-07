@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All User Feedback') }}</div>

                    <table class = 'table'>
                        <tr>
                            <th>User name</th>
                            <th>Feedback</th>
                        </tr>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{$feedback->user->name}}</td>
                                <td>{{$feedback->description}}</td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
