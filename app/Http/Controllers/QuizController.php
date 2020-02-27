<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Questions;
use App\Admin\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Quizresult;
use App\Userquizquestion;

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
    public function takeaquiz(Request $request)
    {
        $categories = category::all();
        $question = collect();
        $session = Session::get('questions');
        if(empty($session)){
            if(!empty($categories)){
                foreach ($categories as $category) {
                    $category->category_name = Questions::where('category_id', $category->id)->inRandomOrder()->limit(3)->get();
                    $question = $question->concat($category->category_name);
                }
                $question = $question->shuffle();
                $questions=$question->all();
                Session::put('questions', $questions);
            }
        }else{
            $questions = Session::get('questions');
        }
    	return view('takequiz', compact('questions'));
    }


    /**
     * Submit the quiz
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function posttakeaquiz(Request $request)
    {
        $custrequests = $this->restructurerequest($request->except(['userid', '_token']));
        $quizresult = Quizresult::create([
                'user_id'=>$request->userid,
                'score'=>null,
                'time'=>null,
            ]);

        $quizid = $quizresult->id;
        foreach($custrequests as $custreq){
            $userquiz = $this-> userquizquestion($custreq, $quizid, $request->userid);
        }
        $totalscore = DB::table('userquizquestions')->where('user_id', $request->userid)->where('quizresult_id', $quizid)->sum('score');
        $quiz = Quizresult::find($quizid);
        $quiz->update([
            'score' => $totalscore,
            ]);
        Session::forget('questions');
        return redirect()->route('home');

    }


    /**
     * verify the answer is true or not
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function matchanswer($questionid, $answer)
    {
        $question = Questions::find($questionid);
        if($question->answer == $answer){
            return true;
        }
        return false;
    }

    /**
     * 
     * Save user quiz question 
     *
     */
    protected function userquizquestion($request, $quizid, $userid){
        $answer = $this->matchanswer($request['question_id'], $request['answer']);
        if(!$answer){
            $answer = 0;
        }else{
            $answer = 1;
        }
        $userquizques = Userquizquestion::create([
            'quizresult_id' => $quizid,
            'user_id' => $userid,
            'ques_id' => $request['question_id'],
            'score' => $answer,
            'answer' => $request['answer'],
        ]);

    }


    /**
     * restructure the request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    protected function restructurerequest($request){
        // dd($request);
        $customReq = array();
        
        foreach($request['question'] as $question){
            $customReq[]['question_id'] = $question; 
        }
        $i = 0;
        foreach($request['answer'] as $answer){
                $customReq[$i]['answer'] = $answer;
                $i++;
        }
        return $customReq;
        // dd($customReq);
    }
}
