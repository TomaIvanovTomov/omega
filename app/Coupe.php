<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Coupe extends Model
{
    use Translatable;
    protected $translatable = ['title'];

    public function getImage()
    {
        return asset('storage/'.json_decode($this->image)[0]->download_link);
    }
}
