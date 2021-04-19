<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    protected $fillable = ['title', 'image'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function models()
    {
        return $this->hasMany(CarModel::class);
    }

    public function getImage()
    {
        return asset('storage/'.json_decode($this->image)[0]->download_link);
    }
}
