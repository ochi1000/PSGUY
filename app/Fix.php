<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fix extends Model
{
    //fields
    protected $fillable = ['service_id','device_name','problem','extra_description','mark'];

}
