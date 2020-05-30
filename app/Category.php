<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function receipes()
    {
        return $this->hasMany('App\Receipe');
    }
}
