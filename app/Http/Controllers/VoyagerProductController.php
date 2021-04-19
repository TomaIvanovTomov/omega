<?php

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class VoyagerProductController extends VoyagerBaseController
{
    public function store(Request $request)
    {
        $parent = parent::store($request);
        $user = Auth::user();
        $id = DB::getPdo()->lastInsertId();
        Product::where("id", $id)->update(['user_id' => $user->id]);
        return $parent;
    }
}
