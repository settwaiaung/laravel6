<?php

namespace App;

use App\Mail\ReceipeStored;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    protected $fillable = ['name', 'ingredients', 'category_id', 'author_id'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($receipe)
            {
                Mail::to('settwaiaung@gmail.com')->send(new ReceipeStored($receipe));
            }
        );
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
