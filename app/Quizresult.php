<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizresult extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'score', 'time', 'answer'
    ];

    /**
     * Get the userquizquestions for the userquizquestions.
     */
    public function userquizquestions()
    {
        return $this->hasMany('App\Userquizquestion');
    }

    /**
     * Get the userquizquestions for the userquizquestions.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
