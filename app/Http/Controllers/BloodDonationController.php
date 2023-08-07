<?php

namespace App\Http\Controllers;

use App\Enum\BloodTypes;
use App\Models\BloodDonation;
use App\Models\User;
use App\Notifications\CreateBloodDonate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;
use PhpParser\Node\Stmt\Echo_;

class BloodDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      //  $bloodDonations =  BloodDonation::paginate(10);
        $bloodDonations =  BloodDonation::all();
        return view("bloodDonation.index" , compact('bloodDonations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bloodDonation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $request->validate([
            'location' => 'required',
            'blood_type' => Rule::in(['AB+' , 'AB-' , 'A+', 'A-' , 'B+' , 'B-', 'O+' , 'O-']),
            'quantity' => ['required' , 'float']
        ]);

        $user = Auth::user();
        if($user->details->blood_type != $request->blood_type){
            return redirect()->route('bloodDonation.index')->with('the blood type you choose are diffrent from your blood type in ou database please choose another one');
        }

        $bloodDonation =  BloodDonation::create([
                'user_id' => auth()->user()->id,
                'location' => $request->location,
                'quantity' => (float)$request->quantity,
                'blood_type' => $request->blood_type,

        ]);

        $users = User::where("id" , "!=" , auth()->user()->id)->get();
        Notification::send($users , new CreateBloodDonate($bloodDonation));

        return redirect()->route('bloodDonation.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bloodDonation = BloodDonation::findOrFail($id);

        $this->markAsRead($bloodDonation);;
        return view("bloodDonation.show" , compact("bloodDonation"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BloodDonation $bloodDonation)
    {
        return view('bloodDonation.edit',compact('bloodDonation'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BloodDonation $bloodDonation)
    {
        $request->validate([
            'user_id' => 'required',
            'location' => 'required',
            'blood_type' => Rule::in(['AB+' , 'AB-' , 'A+', 'A-' , 'B+' , 'B-', 'O+' , 'O-']),
            'quantity' => ['required' , 'float']
        ]);

        $user = Auth::user();
        if($user->details->blood_type != $request->blood_type){
            return redirect()->route('bloodDonation.index')->with('the blood type you choose are diffrent from your blood type in ou database please choose another one');
        }
        $bloodDonation->update($request->all());

        return redirect()->route('donation.index')->with('success','Blood donation details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BloodDonation $bloodDonation)
    {
        $bloodDonation->delete();
        return redirect()->route('donation.index')->with('success','donor deleted successfully');
    }


    public function markAllAsRead()
    {
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return redirect()->back();
    }

    public function markAsRead(BloodDonation $bloodDonation)
    {
        $getID = DB::table("notifications")->where("data->blood_donation_id" , $bloodDonation->id)->pluck("id");
        DB::table("notifications")->where("id" , $getID)->update(["read_at"=>now()]);
    }
}
