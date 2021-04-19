<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class HomeController extends Controller
{
    public function index($locale = null, $slug = null)
    {
        if ($locale) {
           Lang::setLocale($locale);
        }

        if ((is_null($locale) && is_null($slug)) || ($locale && is_null($slug))) {
            $page = Page::where("type", "Home")->first();
            $title = $page->getTranslatedAttribute('title',$locale,'en');
            $banner = asset('storage/'.json_decode($page->banner_image)[0]->download_link);
            $section_banner = asset('storage/'.json_decode($page->section_one_image)[0]->download_link);
            $parallax = asset('storage/'.json_decode($page->parallax_image)[0]->download_link);
            return view('pages.home', compact('banner', 'title', 'section_banner', 'parallax'));
        }

        $page = Page::where("url", $slug)->first();
        $title = $page->getTranslatedAttribute('title', $locale, 'en');

        if ($page->type == "Information") {
            $content = $page->getTranslatedAttribute('content', $locale, 'en');
            return view('pages.information', compact('content', 'title'));
        }

        $banner = asset('storage/'.json_decode($page->banner_image)[0]->download_link);
        $section_banner = asset('storage/'.json_decode($page->section_one_image)[0]->download_link);

        return view('pages.secondary', compact('section_banner', 'banner', 'title'));
    }

    public function sellMyCar($locale = null)
    {
        return view('pages.sellmycar');
    }
}
