<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'id','sale_date','sale_total',
    ];

    public function ticket_sales()
    {
    	return $this->hasMany(Ticket_sale::class,'sale_id','id');
    }

}
