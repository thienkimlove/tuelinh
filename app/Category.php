<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SluggableInterface
{
    use Translatable, SluggableTrait;

    public $translatedAttributes = ['title'];

    protected $fillable = ['slug', 'image', 'parent_id', 'title'];

    /**
     * category have many posts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany('App\Post')->where('status', true);
    }
}
