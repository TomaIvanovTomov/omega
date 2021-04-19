<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function getImage()
    {
        return asset('storage/'.json_decode($this->image)[0]->download_link);
    }
}
