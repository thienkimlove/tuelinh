<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = ['city', 'title', 'address', 'phone', 'area', 'slug'];
}
