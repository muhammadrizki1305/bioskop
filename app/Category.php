<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	public $timestamps = false;

    protected $fillable = [
        'id','category_name',
    ];

    public function films()
    {
        return $this->belongstoMany(Film::class,'film_categories','category_id','film_id');
    }
}
