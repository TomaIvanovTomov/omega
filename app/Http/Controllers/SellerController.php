<?php

namespace App\Http\Controllers;

use App\CarModel;
use App\Color;
use App\Condition;
use App\Engine;
use App\Make;
use App\Product;
use App\ProductImage;
use App\ProductType;
use App\Sellers;
use App\Transmission;
use App\Trim;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SellerController extends Controller
{
    public function stepOne(Request $request)
    {
        $data = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'zip' => $request->get('zip'),
            'year' => $request->get('car-year'),
            'model' => $request->get('car-model'),
            'make' => $request->get('car-make'),
            'price' => $request->get('car-price'),
            'engine' => $request->get('car-engine'),
            'transmission' => $request->get('car-transmission'),
        ];

        $types = Type::all();
        $conditions = Condition::all();
        $trims = Trim::all();
        $transmissions = Transmission::all();
        $engines = Engine::all();
        $colors = Color::all();

        return view('pages.sellmycar2',
            compact(
                'data',
                'types',
                'conditions',
                'trims',
                'transmissions',
                'engines',
                'colors'
            ));
    }

    public function stepTwo(Request $request)
    {
        $types = $request->get('types') ?? [];
        $data = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'zip' => $request->get('zip'),
            'mileage' => $request->get('mileage'),
            'condition' => $request->get('condition'),
            'trim' => $request->get('trim'),
            'transmission' => $request->get('car-transmission'),
            'exterior_color' => $request->get('exterior_color'),
            'interior_color' => $request->get('interior_color'),
            'types' => implode(',', $types),
            'year' => $request->get('car-year'),
            'model' => $request->get('car-model'),
            'make' => $request->get('car-make'),
            'price' => $request->get('car-price'),
            'engine' => $request->get('car-engine'),
        ];

        return view('pages.sellmycar3',
            compact(
                'data'
            ));
    }

    public function stepThree(Request $request)
    {
        $data = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'zip' => $request->get('zip'),
            'mileage' => $request->get('mileage'),
            'condition' => $request->get('condition'),
            'trim' => $request->get('trim'),
            'transmission' => $request->get('transmission'),
            'engine' => $request->get('engine'),
            'exterior_color' => $request->get('exterior_color'),
            'interior_color' => $request->get('interior_color'),
            'types' => $request->get('types'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'year' => $request->get('car-year'),
            'model' => $request->get('car-model'),
            'make' => $request->get('car-make'),
            'car-price' => $request->get('car-price'),
        ];

        return view('pages.images', compact(
            'data'
        ));
    }

    public function vin(Request $request)
    {
        if (isset($_GET['vin'])) {
            $apiPrefix = "https://api.vindecoder.eu/3.1";
            $apikey = "f9251d147b68";
            $secretkey = "6f4a2ad178";
            $id = "decode";
            $vin = mb_strtoupper($_GET['vin']);

            $controlsum = substr(sha1("{$vin}|{$id}|{$apikey}|{$secretkey}"), 0, 10);

            $data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/{$vin}.json", false);
            $result = json_decode($data);

            foreach ($result->decode as $item) {
                if ($item->label == "Model") {
                    $model = $item->value;
                }
                if ($item->label == "Make") {
                    $make = $item->value;
                }
                if ($item->label == "Model Year") {
                    $year = $item->value;
                }
                if ($item->label == "Transmission") {
                    $transmission = $item->value;
                }
                if ($item->label == "Engine Power (kW)") {
                    $engine = $item->value;
                }
            }
            $price = $result->price;

            return view('pages.sellmycar', compact(
                'year',
                'make',
                'model',
                'price',
                'engine',
                'transmission'
            ));
        }
        return view('pages.vin');
    }

    public function stepUpload(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $seller = Sellers::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'zip' => $data['zip']
        ]);

        $make = Make::where('title', 'like', '%' . $data['car-make'] . '%')->first();
        $model = CarModel::where('make_id', $make->id)->where('title', 'like', '%' . $data['model'] . '%')->first();
        $product = Product::create([
            'user_id' => $seller->id,
            'miles' => $data['mileage'],
            'condition_id' => $data['condition'],
            'trim_id' => $data['trim'],
            'transmission_id' => $data['transmission'],
            'engine' => $data['engine'],
            'exterior_color_id' => $data['exterior_color'],
            'interior_color_id' => $data['interior_color'],
            'price' => $data['price'],
            'description' => $data['description'],
            'year' => $data['year'],
            'model_id' => $model->id,
            'make_id' => $make->id,
            'title' => $data['year'] . " " . $data['make'] . " " . $data['model'],
            'active' => "No"
        ]);

        if ($data['types']) {
            $types = explode(",", $data['types']);
            foreach ($types as $type) {
                ProductType::create([
                    'product_id' => $product->id,
                    'type_id' => $type
                ]);
            }
        }

        if ($request->file('images')) {
            foreach ($request->file('images') as $k => $file) {
                $file->move(public_path()."/assets/images/products/", $file->getClientOriginalName());
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $file->getClientOriginalName()
                ]);
            }
        }

        return Redirect::to('/en/product/'.$product->id);
    }
}
