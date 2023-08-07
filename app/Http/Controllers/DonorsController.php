<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donors = User::with('details')->where('role' , 'user')->get();
        //return $donors->details->blood_type;

       return view('donors.index' , compact('donors'));
    }

   public function admin(string $id )
   {
       $user = User::findOrFail($id);

       $user->role = 'admin';
       redirect()->route('donors');
   }
}
