@extends('layouts.app')

@section('content')
    <style>
        .secondary-page-search-header .header-search-wrapper{
            text-align: left;
        }
    </style>
    <div class="banner-search-section" style="background-image: url('{{$banner}}')">
        <img class="img-overlay" src="{{$banner}}"/>
        <div class="container">
            <div class="info-wrapper">
                <h1>{{$title}}</h1>
                <p>{{\App\Helper::t('adv_search')}}</p>
                <div class="secondary-page-search-header">
                    @include('layouts.header-search')
                </div>
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    <div class="secondary-home-section">
        <div class="img-wrapper" style="background-image: url('{{$section_banner}}')">
            <img class="img-overlay" style="visibility: hidden; width: 100%" src="{{$section_banner}}">
            <div class="container">
                <div class="info-wrapper">
                    <h1 class="title">{{\App\Helper::t('buying_used_car')}}</h1>
                    <p class="description">{{\App\Helper::t('buying_used_car_description')}}</p>
                    <a href="#" class="theme-btn">{{\App\Helper::t("search_used_car")}}</a>
                    <hr>
                    <h1 class="title">{{\App\Helper::t('cert_per_owned')}}</h1>
                    <p class="description">{{\App\Helper::t('cert_per_owned_description')}}</p>
                    <a href="#" class="theme-btn learn-more">{{\App\Helper::t("learn_more")}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section-divider"></div>
    @include('layouts.by-brands')
    <div class="section-divider"></div>
    @include('layouts.by-type')
    <div class="section-divider"></div>
    @include('layouts.secondary-search')
    <div class="section-divider"></div>
    <div class="section-divider"></div>
    @include('layouts.pros-cons')
    <div class="section-divider"></div>
    <div class="section-divider"></div>
    @include('layouts.popular-cars')
    <div class="section-divider"></div>
@endsection
