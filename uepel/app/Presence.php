<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    public function lesson()
    {
        return $this->belongsTo( Lesson::class,'lesson_number','id');
    }
    //
}
