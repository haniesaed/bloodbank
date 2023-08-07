@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Blood Donations in the Bank') }}</div>

                    <table class = 'table'>
                        <tr>
                            <th>Blood Type</th>
                            <th>Quantity</th>
                            <th>location</th>
                        </tr>
                        @foreach($bloodDonations as $bloodDonation)
                            <tr>
                                <td>{{$bloodDonation->blood_type}}</td>
                                <td>{{$bloodDonation->quantity}}</td>
                                <td>{{$bloodDonation->location}}</td>

                                <td>
                                @can('isAdmin')
                                    <a class="bottom-0" type="submit"  href="{{route("donation.edit" , ['donation' => $bloodDonation->id])}}" >Edit</a>
                                    <form method="post" action="{{route("donation.destroy" , ['donation' => $bloodDonation->id])}}">
                                        @csrf
                                        @method('delete')
                                        <input class="bottom-50" type="submit" value="Delete">
                                    </form>
                                @endcan
                                    @can('isUser')
                                    <form method="post" action="{{route("request_donation.store" , ['request_donation' => $bloodDonation->id])}}">
                                        @csrf
                                        <input class="bottom-50" type="submit" value="request">
                                    </form>
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
