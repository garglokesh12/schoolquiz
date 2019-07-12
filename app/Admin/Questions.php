<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
    protected $fillable = ['question', 'answer', 'category_id', 'active'];


    /**
     * Get the category that owns the questions.
     */
    public function category()
    {
        return $this->belongsTo('App\Admin\Category');
    }
}
