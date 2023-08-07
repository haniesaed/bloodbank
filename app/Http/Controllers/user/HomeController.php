<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BloodDonation;
use App\Models\Feedback;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("user.home");
    }
}
