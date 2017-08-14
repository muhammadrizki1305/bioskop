<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'id','film_id','studio_id','row_id','chair_id','status','play_at','end_at','start_at','expired_at','created_at','updated_at','price',
    ];

    public function films()
    {
        return $this->belongsTo(Film::class,'film_id');
    }

    public function studios()
    {
        return $this->belongsTo(Studio::class,'studio_id');
    }

    public function rows()
    {
        return $this->belongsTo(Row::class,'row_id');
    }

    public function chairs()
    {
        return $this->belongsTo(Chair::class,'chair_id');
    }

    public function ticket_sales()
    {
        return $this->hasMany(Ticket_sale::class,'ticket_id','id');
    }
}
