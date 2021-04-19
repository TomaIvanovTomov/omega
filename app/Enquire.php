<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enquire extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'product_id',
        'seller_id'
    ];
}
