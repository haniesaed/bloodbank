<?php

namespace App\Http\Controllers;

use App\Models\BloodDonation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $B_positive = BloodDonation::where("blood_type" , "B+")->get()->sum("quantity");
        $B_negative = BloodDonation::where("blood_type" , "B-")->get()->sum("quantity");
        $A_positive = BloodDonation::where("blood_type" , "A+")->get()->sum("quantity");
        $A_negative = BloodDonation::where("blood_type" , "A-")->get()->sum("quantity");
        $O_positive = BloodDonation::where("blood_type" , "O+")->get()->sum("quantity");
        $O_negative = BloodDonation::where("blood_type" , "O+")->get()->sum("quantity");
        $AB_positive = BloodDonation::where("blood_type" , "AB+")->sum("quantity");
        $AB_negative = BloodDonation::where("blood_type" , "AB-")->sum("quantity");


        $date = Carbon::now()->ToDateString();

        $date = $date." "."00:00:00";

        $donates_number_today =  BloodDonation::where("created_at" , $date)->get()->count();
        $donates_total = User::where("role" , 'user')->sum("id");

        return view('home' , compact( 'donates_total','donates_number_today', 'B_positive' , 'B_negative' , 'A_positive' , 'A_negative' , 'O_positive' , 'O_negative' , 'AB_positive' , 'AB_negative') );

    }

    public function show(string $blood_type)
    {

        $data = BloodDonation::where("blood_type" , $blood_type)->get();

        return view('blood_type_show' , compact('data') );
    }
}
