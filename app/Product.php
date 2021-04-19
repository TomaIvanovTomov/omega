<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Product extends Model
{
    use Translatable;
    protected $translatable = ['title'];

    protected $fillable = [
        'user_id',
        'miles',
        'condition_id',
        'trim_id',
        'transmission_id',
        'engine',
        'exterior_color_id',
        'interior_color_id',
        'price',
        'description',
        'year',
        'model_id',
        'make_id',
        'title',
        'active'
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function coupe()
    {
        return $this->belongsTo(Coupe::class);
    }

    public function types()
    {
        return ProductType::where('product_id', $this->id)->get();
    }

    public function user()
    {
        return $this->belongsTo(Sellers::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getImage()
    {
        $image = ProductImage::where('product_id', $this->id)->first();
        return asset('assets/images/products/'.$image->image);
    }

    public function isWishlist()
    {
        $user = Auth::user();
        if ($user) {
            return (bool)Wishlist::where(['product_id' => $this->id, 'user_id' => $user->id])->first();
        } else {
            return  false;
        }

    }
}
