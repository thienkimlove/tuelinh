<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements SluggableInterface
{
    use Translatable, SluggableTrait;

    public $translatedAttributes = ['title', 'desc', 'content'];

    protected $fillable = ['category_id', 'slug', 'image', 'status', 'title', 'desc', 'content'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
