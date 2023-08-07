<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback' , compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.feedback_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => ['required', 'string'],
            'rate' => Rule::in([1 , 2 , 3 , 4 , 5]),
        ]);

        Feedback::create([
            'user_id' => auth()->id(),
            'description' => $request->description,
            'rate' => $request->rate,
        ]);

        return redirect()->to('/home');
    }

}
