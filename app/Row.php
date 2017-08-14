<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{

	public $timestamps = false;

    protected $fillable = [
        'id','row_name',
    ];//

    public function tickets()
    {
    	return $this->hasMany(Ticket::class,'row_id','id');
    }
}
