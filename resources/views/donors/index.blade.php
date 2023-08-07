@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('All Donors in the Bank') }}</div>

                    <table class = 'table'>
                        <tr>
                            <th>donor name</th>
                            <th>donor blood type</th>
                            <th>donor location</th>
                            <th>donor phone</th>
                            <th>Operations</th>
                        </tr>
                        @foreach($donors as $donor)
                        <tr>
                                <td>{{$donor->name}}</td>
                                <td>{{$donor->details->blood_type}}</td>
                                <td>{{$donor->details->location}}</td>
                                <td>{{$donor->details->phone}}</td>
                                <td>  <a class="bottom-0" type="submit"  href="{{route("user.edit" , ['user' => $donor->id] )}}" >Edit</a>
                                    <form method="post" action="{{route("user.destroy" , ['user' => $donor->id])}}">
                                        @csrf
                                        @method('delete')
                                        <input class="bottom-50" type="submit" value="Delete">
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
