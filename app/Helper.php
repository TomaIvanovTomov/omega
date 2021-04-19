<?php

namespace App;

use GuzzleHttp\Psr7\Uri;
use Highlight\Mode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use MongoDB\BSON\Type;

class Helper extends Model
{
    public static function getHeaderMenuVisiblePages()
    {
        foreach (Page::where("header_menu", "Yes")->orderBy("header_order")->limit(4)->get() as $item) {
            yield $item;
        }
    }

    public static function getHeaderMorePages()
    {
        foreach (Page::where("header_menu", "Yes")->orderBy("header_order")->limit(PHP_INT_MAX)->offset(4)->get() as $item) {
            yield $item;
        }
    }

    public static function renderFooterMenu()
    {
        return "<h1>FOOTER MENU IS HERE</h1>";
    }

    public static function getCurrentUser()
    {
        return Auth::user();
    }

    public static function getAllMakesForSelect2()
    {
        return Make::select('id', 'title as text')->get()->toArray();
    }

    public static function t($key)
    {
        $translation = CustomTranslation::where("key", $key)->first();
        return $translation->getTranslatedAttribute('text', Lang::getLocale(), 'en');
    }

    public static function getProducts($limit)
    {
        foreach (Product::inRandomOrder()->where("active", "=", "Yes")->limit($limit)->get() as $product) {
            yield $product;
        }

    }

    public static function getBrands($limit)
    {
        foreach (Make::inRandomOrder()->limit(12)->get() as $item) {
            yield $item;
        }
    }

    public static function getTypes()
    {
        foreach (Coupe::all() as $item) {
            yield $item;
        }
    }

    public static function getClients($limit)
    {
        foreach (Client::inRandomOrder()->limit($limit)->get() as $item) {
            yield $item;
        }
    }

    public static function getBestTypes()
    {
        foreach (Coupe::where("best_type_section", "Yes")->limit(3)->get() as $item) {
            yield $item;
        }
    }

    public static function getPopularCars()
    {
        foreach (Product::inRandomOrder()->limit(44)->get() as $item) {
            yield $item;
        }
    }

    public static function getFooterPages($column)
    {
        foreach (Page::where([
            "footer_column" => $column,
            'footer_menu' => "Yes"
            ])->get() as $item) {
            yield $item;
        }
    }

    public static function getCarYears()
    {
        return Product::select('year as id', 'year as text')->groupBy('text')->get()->toArray();
    }

    public static function getCarZips()
    {
        return Product::select('zip as id', 'zip as text')->groupBy('text')->get()->toArray();
    }

    public static function getAllYears()
    {
        $years = [];
        $current = date("Y");
        for($i=1980; $i <= (int)$current; $i++) {
            $years[] = [
                'id' => $i,
                'text' => $i
            ];
        }
        return array_reverse($years);
    }
}
