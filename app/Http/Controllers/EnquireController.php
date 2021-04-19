<?php

namespace App\Http\Controllers;

use App\Enquire;
use App\Helper;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class EnquireController extends Controller
{
    public function index($locale, $id)
    {
        $product = Product::where("id", $id)->first();
        return view('pages.enquire', compact('product'));
    }

    public function send(Request $request)
    {
        Enquire::create([
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'message' => $request->get('message'),
            'seller_id' => $request->get('seller_id'),
            'product_id' => $request->get('product_id')
        ]);

        $lang = Lang::getLocale();
        $redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/$lang/product/" . $request->get('product_id');
        $seller = User::where("id", $request->get('seller_id'))->first();
        $data = [
            'product' => Product::where("id", $request->get('product_id'))->first(),
            'seller' => $seller,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'content' => $request->get('message')
        ];
        Mail::send('mail', $data, function($message) use ($seller, $request) {
            $message->to($seller->email, $seller->email)->subject
            (Helper::t('car_enquire'));
            $message->from($request->get('email'), $request->get('first_name') . " " . $request->get('last_name'));
        });

        return json_encode([
            'type' => 'success',
            'message' => Helper::t('your_message_was_sent_successfully'),
            'referer' => $redirect
        ]);
    }
}
