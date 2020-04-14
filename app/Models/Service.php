<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //fields
    protected $fillable = ['name','location','price','address','description'];
}
