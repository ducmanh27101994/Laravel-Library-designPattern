<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    protected $table = 'borrows';

    function student(){
        return $this->belongsTo('App\Student');
    }

    function books(){
        return $this->belongsToMany('App\Book','details','borrow_id','book_id');
    }


}