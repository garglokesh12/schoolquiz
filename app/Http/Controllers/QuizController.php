<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
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
     * Show the Quiz On User dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function takeaquiz()
    {
    	return view('takequiz');
    }

}
