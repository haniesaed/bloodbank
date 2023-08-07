<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\RequestDonation;
use App\Models\User;
use App\Models\UserDetails;
use App\Notifications\CreateBloodDonate;
use App\Notifications\CreateRequestDonate;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RequestDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestDonations = RequestDonation::with(  'bloodDonation' , 'user')->where("status" , "Pending")->get();
       // return $requestDonations;
        return view("requestDonation.index" , compact("requestDonations"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestDonation = RequestDonation::create([
            "user_id" => auth()->id(),
            "blood_donation_id" => $request->request_donation,
            "status" => RequestDonation::STATUS_PENDING,
        ]);

        $users = User::where("role" , "=" , "admin")->get();
        Notification::send($users , new CreateRequestDonate($requestDonation));
        return redirect()->route("donation.index")->with('success');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestDonation $requestDonation)
    {
        return view('request.edit',compact('requestDonation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RequestDonation $requestDonation)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $requestDonation->update($request->all());

        return redirect()->route('requests.index')->with('success','request details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RequestDonation $requestDonation)
    {
        $requestDonation->delete();
        return redirect()->route('request.index')->with('success','donor deleted successfully');
    }

    public function approve(RequestDonation $requestDonation )
    {

       // dd($requestDonation->blood_donation_id);
        $requestDonation->update(['status' => RequestDonation::STATUS_APPROVED]);

        $bloodDonation = BloodDonation::findOrFail($requestDonation->blood_donation_id);
        $bloodDonation->delete();

        return redirect()->route('request_donation.index')->with('success','request approved successfully');
    }
}
