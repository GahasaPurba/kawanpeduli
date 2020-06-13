<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Discussion extends Model
{
    use SoftDeletes, Commentable;

    protected $fillable = ['user_id', 'forum_category_id', 'title', 'slug', 'description'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function forum_category()
    {
        return $this->belongsTo('App\ForumCategory');
    }

    public function tag()
    {
        return $this->belongsToMany('App\ForumTag');
    }
}
