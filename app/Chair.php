<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{

	public $timestamps = false;

   protected $fillable = [
        'id','chair_number',
    ];

    public function tickets()
    {
    	return $this->hasMany(Ticket::class,'chair_id','id');
    }
}
