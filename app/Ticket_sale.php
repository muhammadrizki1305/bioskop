<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket_sale extends Model
{
    protected $fillable = [
        'id','sale_id','ticket_id','user_id'
    ];

    public function ticket_sales()
    {
        return $this->belongsTo(Ticket_sale::class,'sale_id');
    }

    public function tickets()
    {
        return $this->belongsTo(Ticket::class,'ticket_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
