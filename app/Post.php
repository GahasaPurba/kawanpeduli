<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use SoftDeletes, Commentable;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'content', 'quote', 'thumbnail'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tag()
    {
        return $this->belongsToMany('App\Tag');
    }
}
