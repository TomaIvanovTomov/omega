@extends('layouts.app')

@section('content')
    <style>
        #sell-car-form {
            padding: 30px 90px;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            border-radius: 15px;
        }
    </style>
    <div class="section-divider"></div>
    <div class="bg-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" style="background:white">
                    <div class="col-sm-12 text-center">
                        <h3>{{\App\Helper::t("seller_contact_info")}}</h3>
                        <p>{{\App\Helper::t('seller_contact_info_text')}}</p>
                    </div>
                    <div class="form-wrapper">
                        <form method="post" action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/sell-car-step-one" id="sell-car-form">
                            @csrf
                            <div class="form-group">
                                <input required class="form-control" type="text" name="first_name" value=""
                                       placeholder="{{\App\Helper::t('first_name')}}">
                            </div>
                            <div class="form-group">
                                <input required type="text" name="last_name" value=""
                                       class="form-control" placeholder="{{\App\Helper::t('last_name')}}">
                            </div>
                            <div class="form-group">
                                <input required class="form-control" type="text" name="phone" value="" placeholder="{{\App\Helper::t('phone')}}">
                            </div>
                            <div class="form-group">
                                <input required class="form-control" type="email" name="email" value="" placeholder="{{\App\Helper::t('email')}}">
                            </div>
                            <div class="form-group">
                                <input required class="form-control" type="text" name="zip" value="" placeholder="{{\App\Helper::t('zip')}}">
                            </div>
                            <div class="form-group">
                                <button class="theme-btn">{{\App\Helper::t('next')}}</button>
                            </div>
                            <input type="hidden" name="car-year" value="{{$year}}"/>
                            <input type="hidden" name="car-make" value="{{$make}}"/>
                            <input type="hidden" name="car-model" value="{{$model}}"/>
                            <input type="hidden" name="car-price" value="{{$price}}"/>
                            <input type="hidden" name="car-engine" value="{{$engine}}"/>
                            <input type="hidden" name="car-transmission" value="{{$transmission}}"/>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6" style="background:whitesmoke; padding: 50px 100px; ">
                    <?php
                    $data = [
                        'make' => $make,
                        'year' => $year,
                        'model' => $model,
                        'price' => $price
                    ];
                    ?>
                    @include('layouts.car-preview', [
                        'data' => $data
                         ])
                </div>
            </div>
        </div>
    </div>
@endsection
