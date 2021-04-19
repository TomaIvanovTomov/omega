<?php

namespace App\Http\Controllers;

use App\Brand;
use App\CarModel;
use App\Color;
use App\Coupe;
use App\Door;
use App\Drive;
use App\Feature;
use App\Fuel;
use App\Helper;
use App\Make;
use App\Product;
use App\Transmission;
use App\Type;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        $makes = Make::select(['id', 'title'])->get()->toArray();
        $fuels = Fuel::select(['id', 'title'])->get()->toArray();
        $drives = Drive::select(['id', 'title'])->get()->toArray();
        $transmissions = Transmission::select(['id', 'title'])->get()->toArray();
        $colors = Color::select(['id', 'title'])->get()->toArray();
        //$brands = Brand::select(['id', 'title'])->get()->toArray();
        $types = Type::select(['id', 'title'])->get();
        $doors = Door::select(['id', 'title'])->get();
        $coupes = Coupe::select(['id', 'title'])->get()->toArray();
        $features = Feature::select(['id', 'title'])->get()->toArray();
        $years = Helper::getAllYears();
        $min_price = 0;
        $max_price = 0;
        $order = isset($_GET['order']) ? htmlspecialchars($_GET['order']) : 1;
        $where_year = isset($_GET['year']) ? implode(",", array_map(function ($v) {
            if ($v) {
                return "'".htmlspecialchars($v)."'";
            }
        }, $_GET['year'])) : [];
        $where_zip = isset($_GET['zip']) ? htmlspecialchars($_GET['zip']) : false;
        $where_make = isset($_GET['make']) ? htmlspecialchars($_GET['make']) : false;
        $where_coupe = isset($_GET['coupe']) ? htmlspecialchars($_GET['coupe']) : false;
        $where_model = isset($_GET['model']) ? implode(",", array_map(function ($v) {
            if ($v) {
                return "'".htmlspecialchars($v)."'";
            }
        }, $_GET['model'])) : [];
        $where_type = isset($_GET['type']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['type'])) : [];
        $where_fuel = isset($_GET['fuel']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['fuel'])) : [];
        $where_drive = isset($_GET['drive']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['drive'])) : [];
        $where_door = isset($_GET['door']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['door'])) : [];
        $where_exterior_color = isset($_GET['exterior_color']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['exterior_color'])) : [];
        $where_interior_color = isset($_GET['interior_color']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['interior_color'])) : [];
        $where_transmission = isset($_GET['transmission']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['transmission'])) : [];
        $where_feature = isset($_GET['feature']) ? implode(",", array_map(function ($v) {
            return "'".htmlspecialchars($v)."'";
        }, $_GET['feature'])) : [];

        if (isset($_GET['car-model'])) {
            $where_car_models = [];
            foreach ($_GET['car-model'] as $m_id) {
                $where_car_models[] = "model_id={$m_id}";
            }
            $where_car_models = implode(" OR ", $where_car_models);
        }

        if (isset($_GET['single-type'])) {
            $s_type = htmlspecialchars($_GET['single-type']);
            $where = " AND type = $s_type";
        } else {
            $where = ($where_year ? " AND year IN ($where_year)" : "") .
                ($where_make ? " AND make_id=$where_make" : "") .
                ($where_model ? " AND model_id IN ($where_model)" : "") .
                ($where_coupe ? " AND coupe_id='$where_coupe'" : "") .
                ($where_type ? " AND type IN ($where_type)" : "") .
                ($where_fuel ? " AND fuel IN ($where_fuel)" : "") .
                ($where_drive ? " AND drive_id IN ($where_drive)" : "") .
                ($where_door ? " AND door_id IN ($where_door)" : "") .
                ($where_transmission ? " AND transmission_id IN ($where_transmission)" : "") .
                ($where_exterior_color ? " AND exterior_color_id IN ($where_exterior_color)" : "") .
                ($where_interior_color ? " AND interior_color_id IN ($where_interior_color)" : "") .
                (isset($where_car_models) ? " AND ($where_car_models)" : "") .
                ($where_zip ? " AND zip='$where_zip'" : "");
        }

        $grid = isset($_GET['grid']) ? $_GET['grid'] : 2;

        if (isset($_GET['min-price']) && $_GET['min-price']) {
            $min_price = htmlspecialchars($_GET['min-price']);
        }
        if (isset($_GET['max-price']) && $_GET['max-price']) {
            $max_price = htmlspecialchars($_GET['max-price']);
        }

        $order_by = "price ASC";
        if ($order == 1) {
            $order_by = "price ASC";
        } elseif ($order == 2) {
            $order_by = "price DESC";
        } elseif ($order == 3) {
            $order_by = "miles ASC";
        } elseif ($order == 4) {
            $order_by = "miles DESC";
        } elseif ($order == 5) {
            $order_by = "year ASC";
        } else {
            $order_by = "year DESC";
        }
        if ($min_price == 0 && $max_price == 0) {
            $between = "";
        } else {
            $between = "AND price BETWEEN $min_price AND $max_price";
        }

        $products = DB::select("SELECT p.* FROM products as p
            LEFT JOIN product_features as pf ON p.id=pf.product_id
            WHERE 1=1 AND active='Yes' $where AND p.featured='No' $between ORDER BY $order_by");
        $featured_products = DB::select("SELECT p.* FROM products as p
            LEFT JOIN product_features as pf ON p.id=pf.product_id
            WHERE 1=1 AND active='Yes' $where AND p.featured='Yes' $between ORDER BY $order_by");
        $price_range = DB::select("SELECT MIN(price) as min,MAX(price) as max FROM products
            WHERE 1=1 AND active='Yes' $where");
        $search_products = array_map(function ($p) {
            return Product::where('id', $p->id)->first();
        }, $products);

        $search_products_featured = array_map(function ($p) {
            return Product::where('id', $p->id)->first();
        }, $featured_products);

        $s_make = isset($_GET['make']) && $_GET['make'] ? Make::where("id", $_GET['make'])->first()->title : "";
        $s_model = [];
        if (isset($_GET['model']) && $_GET['model'][0]) {
            foreach ($_GET['model'] as $item) {
                $s_model[] = CarModel::where("id", $item)->first()->title;
            }
        }
        $s_models = [];
        if (isset($_GET['car-model'])) {
            foreach ($_GET['car-model'] as $item) {
                $s_models[] = CarModel::where("id", $item)->first()->title;
            }
        }
        $s_type = [];
        if (isset($_GET['type']) && $_GET['type'][0]) {
            foreach ($_GET['type'] as $item) {
                $s_type[] = Type::where("id", $item)->first()->title;
            }
        }
        //$s_brand = isset($_GET['brand']) && $_GET ? Brand::where("id", $_GET['brand'])->first()->title : "";
        $s_coupe = isset($_GET['coupe']) && $_GET ? Coupe::where("id", $_GET['coupe'])->first()->title : "";
        $s_year = [];
        if (isset($_GET['year']) && $_GET['year'][0]) {
            foreach ($_GET['year'] as $item) {
                $s_year[] = $item;
            }
        }

        return view('pages.search', compact(
                'price_range',
                's_models','s_type',
                'min_price',
                'fuels',
                'colors',
                'features',
                'transmissions',
                'drives',
                'doors',
                'max_price',
                's_make',
                's_model',
                /*'s_brand',*/
                's_coupe',
                's_year',
                'search_products_featured',
                /*'brands',*/
                'coupes',
                'makes',
                'types',
                'years',
                'search_products',
                'grid',
                'order'
            )
        );
    }
}
