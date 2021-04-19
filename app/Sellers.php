<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellers extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'zip'
    ];
}
