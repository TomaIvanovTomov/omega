<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Type extends Model
{
    use Translatable;
    protected $translatable = ['title'];

    public function productsCount()
    {
        return count(Product::where('type', $this->id)->get());
    }
}
