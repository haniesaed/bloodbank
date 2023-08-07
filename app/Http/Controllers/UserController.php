<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(User $user)
    {
        return view("profile.user_profile" , compact("user"));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('profile.user_profile_edite',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , User $user)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'blood_type' =>  Rule::in(['AB+' , 'AB-' , 'A+', 'A-' , 'B+' , 'B-', 'O+' , 'O-']),
        ]);

        $user->update(['name' => $request->name]);

       $user_details = $user->details->where('id' , $user->id);
       $user_details->update(['blood_type' => $request->blood_type , 'location' => $request->location , 'phone' => $request->phone]);

        return redirect()->route('user.show' , ['user' => auth()->id()])->with('success','donor details updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->details->delete();
        $user->delete();
        return redirect()->route('donor.index')->with('success','donor deleted successfully');

    }
}
