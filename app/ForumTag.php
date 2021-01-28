<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumTag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function discussion()
    {
        return $this->belongsToMany('App\Discussion');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
