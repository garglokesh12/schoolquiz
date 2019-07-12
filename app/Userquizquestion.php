<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userquizquestion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'quizresult_id', 'score','ques_id',
    ];

    /**
     * Get the quiz for the userquizquestions.
     */
    public function quizresult()
    {
        return $this->belongsTo('App\Quizresult');
    }

}
