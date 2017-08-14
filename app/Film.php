<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'id','film_tittle','film_description','film_picture','created_at','updated_at',
    ];

     public function categories()
    {
        return $this->belongstoMany(Category::class,'film_categories','film_id','category_id');
    }

    public function tickets()
    {
    	return $this->hasMany(Ticket::class,'film_id','id');
    }
}
