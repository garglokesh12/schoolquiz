<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = ['category_name'];


    /**
     * Get the questions for the blog category.
     */
    public function questions()
    {
        return $this->hasMany('App\Admin\Questions');
    }

}
