@extends('layouts.app')

@php
    use App\Helper;
    use Illuminate\Support\Facades\Lang
@endphp
@section('content')
    @include('layouts.header-search')
    <div class="banner-search-section" style="background-image: url('{{$banner}}')">
        <img class="img-overlay" src="{{$banner}}"/>
        <div class="container">
            <div class="info-wrapper">
                <h1>{{\App\Helper::t('home_title')}}</h1>
                <p>{{\App\Helper::t('home_slogan')}}</p>
                <a class="theme-btn" href="#">{{\App\Helper::t('home_btn_text')}}</a>
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    @include('layouts.carousel')
    <div class="section-divider"></div>
    <div class="home-section">
        <h1>{{\App\Helper::t("sell_my_car")}}</h1>
        <div class="img-wrapper" style="background-image: url('{{$section_banner}}')">
            <img class="img-overlay" style="visibility: hidden; width: 100%" src="{{$section_banner}}">
            <div class="container">
                <div class="info-wrapper">
                    <h1 class="title">{{\App\Helper::t('instant_cash_offer')}}</h1>
                    <p class="description">{{\App\Helper::t('instant_cash_description')}}</p>
                    <hr>
                    <h4 class="slogan">{{\App\Helper::t('instant_cash_secondary_title')}}</h4>
                    <p class="description_two">{{\App\Helper::t('instant_cash_secondary_description')}}</p>
                    <a class="theme-btn" href="#">{{\App\Helper::t('get_instant_offer')}}</a>
                    <a class="theme-btn create-ad" href="#">{{\App\Helper::t('create_my_ad')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    @include('layouts.by-brands')
    <div class="section-divider"></div>
    @include('layouts.by-type')
    <div class="section-divider"></div>
    <div class="parallax-wrapper" style="background-image: url('{{$parallax}}')">
        <img src="{{$parallax}}" style="visibility: hidden"/>
        <div class="info-wrapper">
            <h1 class="title">{{\App\Helper::t('parallax_title')}}</h1>
            <h4 class="slogan">{{\App\Helper::t('parallax_slogan')}}</h4>
            <p class="description">{{\App\Helper::t('parallax_description')}}</p>
        </div>
    </div>
    <div class="section-divider"></div>
    <div class="clients">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>{{\App\Helper::t("happy_clients")}}</h1>
                    <h5>#{{\App\Helper::t("shop_with_us")}}</h5>
                </div>
                @foreach(\App\Helper::getClients(4) as $client)
                    <div class="col-sm-3">
                        <div class="client-wrapper">
                            <div class="image-wrapper">
                                <img src="{{$client->getImage()}}" alt="{{$client->instagram_name}}">
                            </div>
                            <div class="instagram">
                                <img class="insta-img" src="{{asset('assets/images/instagram.png')}}"/>
                                <a target="_blank" href="{{$client->instagram_link}}">#{{$client->instagram_name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    <div class="popular-used-cars">
        <div class="container">
            <h1>{{\App\Helper::t('popular_used_cars')}}</h1>
            <div class="row">
                @foreach(\App\Helper::getBestTypes() as $type)
                    @php $title = $type->getTranslatedAttribute('title', Lang::getLocale(), 'en') @endphp
                    <div class="col-sm-4">
                        <div class="best-type-wrapper">
                            <h5>{{\App\Helper::t("used_cars")}}</h5>
                            <div class="image-wrapper">
                                <img src="{{$type->getImage()}}" alt="{{$title}}">
                            </div>
                            <div class="info-wrapper">
                                <p class="title">{{\App\Helper::t('best')}} {{$title}} {{\App\Helper::t('cars')}}</p>
                                <p class="description">{{\App\Helper::t('best_used_desc')}}</p>
                                <p class="link">
                                    <a href="#">
                                        {{\App\Helper::t('research_best')}} {{$title}} {{\App\Helper::t("cars")}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-sm-12">
                    <div class="text-center">
                        <a class="theme-btn" href="#">{{\App\Helper::t('research_more_cars')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    @include('layouts.popular-cars')
    <div class="section-divider"></div>
@endsection
