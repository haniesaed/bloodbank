@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Blood Donations in the Bank') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label>
                        B+ Total Donates: {{$B_positive}} L <br>
                        B- Total Donates: {{$B_negative}} L <br>
                        A+ Total Donates: {{$A_positive}} L <br>
                        A- Total Donates: {{$A_negative}} L <br>
                        O+ Total Donates: {{$O_positive}} L <br>
                        O- Total Donates: {{$O_negative}} L <br>
                        AB+ Total Donates: {{$AB_positive}} L <br>
                        AB- Total Donates: {{$AB_negative}} L <br>
                        <br>
                    </label>

                        <br>
                     <label>
                         Donatrs number today: {{$donates_number_today}}  <br>
                         Donatrs Total:{{$donates_total}}  <br>
                    </label>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
