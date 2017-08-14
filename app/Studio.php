<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
	public $timestamps = false;


    protected $fillable = [
        'id','studio_number',
    ];

    public function tickets()
    {
    	return $this->hasMany(Ticket::class,'studio_id','id');
    }
}
