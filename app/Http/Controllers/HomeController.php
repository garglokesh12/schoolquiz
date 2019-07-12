<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Quizresult;
use Auth;
use App\Userquizquestion;
use App\Admin\Questions;
use App\Admin\Category;
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
        $user = Auth::user();
        $quizs = Quizresult::with('userquizquestions')->where('user_id', $user->id)->get();
        foreach($quizs as $quiz){
            foreach($quiz->userquizquestions as $userquizquestion){
                $categoryname = $this->categorynamefromquesid($userquizquestion->ques_id);
                $userquizquestion->category_name = $categoryname;
            }
        }
        $categories =  Category::all();
        return view('home', compact('quizs', 'categories'));
    }

    /**
    *   return the category name 
    *   @param $quesid 
    *   @return name of the category of questions
    **/
    protected function categorynamefromquesid($quesid){
        $categoryname = Questions::find($quesid)->category()->first()->category_name; 
        return $categoryname;
    }

}
