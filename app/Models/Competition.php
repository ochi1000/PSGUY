<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    //fields
    protected $fillable = ['name', 'competitors_name', 'competitors_email', 'competitors_phone', 'competitors_age'];
}
