<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserDetailsController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.details_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        Validator::make($request, [
            'blood_type' => ['required', 'string'],
            'location' => ['required', 'string'],
            'phone' => ['required', 'string', 'min:10'],
            'user_id' => ['required', 'string|int' ],
        ]);

        UserDetails::create([
            'blood_type' => $request->blood_type,
            'location' => $request->location,
            'phone' => $request->phone,
            'user_id' => $request->user()->id
        ]);

        return redirect('home')->with('success');
    }
}
