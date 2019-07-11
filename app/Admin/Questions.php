<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //
    protected $fillable = ['question', 'answer', 'category_id', 'active'];
}
