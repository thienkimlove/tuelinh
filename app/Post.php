<?php

namespace App;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'title',
        'desc',
        'content'
    ];

    protected $fillable = [
        'category_id',
        'image',
        'status',
        'content',
        'desc',
        'title',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    /**
     * get the tags that associated with given post
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * get the list tags of current post.
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('name');
    }

    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
