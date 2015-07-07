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
        'content',
        'keyword'
    ];

    protected $fillable = [
        'category_id',
        'image',
        'status',
        'content',
        'desc',
        'title',
        'keyword',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
