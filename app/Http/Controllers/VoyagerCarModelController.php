<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class VoyagerCarModelController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        return parent::store($request); // TODO: Change the autogenerated stub
    }

    public function update(Request $request, $id)
    {
        return parent::update($request, $id); // TODO: Change the autogenerated stub
    }
}
