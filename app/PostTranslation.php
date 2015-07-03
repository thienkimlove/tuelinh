<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    protected $fillable = ['title', 'content', 'desc', 'locale', 'post_id'];
}
