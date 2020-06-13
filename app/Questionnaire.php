<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = ['user_id', 'question1', 'question2', 'question3', 'question4', 'suggestion'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
