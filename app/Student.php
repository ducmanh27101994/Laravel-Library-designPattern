<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'students';

    function borrows(){
        return $this->hasMany('App\Borrow','student_id');
    }
}


