<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    protected $fillable = ['name', 'ingredients', 'category_id', 'author_id'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
