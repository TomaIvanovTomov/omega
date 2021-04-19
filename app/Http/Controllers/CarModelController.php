<?php

namespace App\Http\Controllers;

use App\CarModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    public function getModels()
    {
        return CarModel::select('id', 'title as text')->where('make_id', $_GET['id'])->get()->toArray();
    }
}
