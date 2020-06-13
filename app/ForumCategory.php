<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $fillable = ['name', 'slug'];

    public function discussion()
    {
        return $this->hasMany('App\Discussion');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
