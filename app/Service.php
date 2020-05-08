<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //fields
    protected $fillable = [
        'user_id','user_name','user_phone','user_email',
        'state','address','total','payment_gateway',
        'error'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function fixes()
    {
        return $this->belongsToMany('App\Fix');
    }
}
