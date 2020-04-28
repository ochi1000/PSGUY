<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //fields
    protected $fillable = ['name','location','price','address','description'];
}
