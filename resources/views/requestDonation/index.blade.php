@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Blood Donations in the Bank') }}</div>

                    <table class = 'table'>
                        <tr>
                            <th>User name</th>
                            <th>blood Type</th>
                            <th>Donor name</th>
                            <th>status</th>
                        </tr>
                        @foreach($requestDonations as $requestDonation)
                            <tr>
                                <td>{{$requestDonation->user->name}}</td>
                                <td>{{$requestDonation->bloodDonation->blood_type}}</td>
                                <td>{{$requestDonation->bloodDonation->user->name}}</td>
                                <td>{{$requestDonation->status}}</td>
                                <td>
                                    <a class="bottom-0" type="submit"  href="{{route("request_donation.approve" , ['request_donation' => $requestDonation])}}" >Approve</a>

                                    <form method="post" action="{{route("request_donation.destroy" , ['request_donation' => $requestDonation])}}">
                                        @csrf
                                        @method('delete')
                                        <input class="bottom-50" type="submit" value="deny">
                                    </form>
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
