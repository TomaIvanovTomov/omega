<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        var_dump("asddasads");die;
    }

    public function save()
    {
        $user = Auth::user();
        if (!$user) {
            return 3;
        }
        if (Wishlist::where(['user_id' => $user->id, 'product_id' => $_GET['id']])->first()) {
            Wishlist::where(['user_id' => $user->id, 'product_id' => $_GET['id']])->delete();
            return 2;
        }
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $_GET['id']
        ]);
        return 1;
    }
}
