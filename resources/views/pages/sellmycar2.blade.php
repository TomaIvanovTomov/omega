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
         .container-checkbox {
             background: none;
             margin-top: 10px;
             text-align: left;
         }
         .types-wrapper {
             margin-bottom: 20px;
         }
        .types-wrapper .checkmark, .types-wrapper .checkmark::hover {
            top: 3px;
        }
    </style>
    <div class="section-divider"></div>
    <div class="bg-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-6" style="background:white">
                    <div class="col-sm-12 text-center">
                        <h3>{{\App\Helper::t("seller_car_details")}}</h3>
                        <p>{{\App\Helper::t('seller_car_details_text')}}</p>
                    </div>
                    <div class="form-wrapper">
                        <form method="post" action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/sell-car-step-two" id="sell-car-form">
                            @csrf
                            @foreach($data as $key => $value)
                                <input type="hidden" name="{{$key}}" value="{{$value}}" />
                            @endforeach
                            <div class="form-group">
                                <input required class="form-control" type="text" name="mileage" value=""
                                       placeholder="{{\App\Helper::t('mileage')}}">
                            </div>
                            <div class="form-group">
                                <select name="condition" id="condition" class="form-control">
                                    <option value="">{{\App\Helper::t('condition')}}</option>
                                    @foreach($conditions as $condition)
                                        <option value="{{$condition->id}}">{{$condition->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="trim" value="">
<!--                                <select name="trim" id="trim" class="form-control">
                                    <option value="">{{\App\Helper::t('trim')}}</option>
                                    @foreach($trims as $trim)
                                        <option value="{{$trim->id}}">{{$trim->title}}</option>
                                    @endforeach
                                </select>-->
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $data['transmission'] ?>" disabled class="form-control" placeholder="Transmission" name="transmission">
                            </div>
                            <div class="form-group">
                                <input type="text" value="<?= $data['engine'] ?> Kw" disabled class="form-control" placeholder="Engine Power in Kw" name="engine">
                            </div>
                            <div class="form-group">
                                <select name="exterior_color" id="exterior_color" class="form-control">
                                    <option value="">{{\App\Helper::t('exterior_color')}}</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="interior_color" id="interior_color" class="form-control">
                                    <option value="">{{\App\Helper::t('interior_color')}}</option>
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}">{{$color->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group types-wrapper">
                            @foreach($types as $type)
                                <label class="container-checkbox">
                                    <span class="value-name">{{$type->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</span>
                                    <input  type="checkbox" name="types[]" class="filter-checkbox" value="{{$type->id}}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                            </div>
                            <div class="form-group">
                                <button class="theme-btn">{{\App\Helper::t('next')}}</button>
                            </div>
                            <input type="hidden" name="car-year" value="{{$data['year']}}"/>
                            <input type="hidden" name="car-make" value="{{$data['make']}}"/>
                            <input type="hidden" name="car-model" value="{{$data['model']}}"/>
                            <input type="hidden" name="car-price" value="{{$data['price']}}"/>
                            <input type="hidden" name="car-engine" value="{{$data['engine']}}"/>
                            <input type="hidden" name="car-transmission" value="{{$data['transmission']}}"/>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6" style="background:whitesmoke; padding: 50px 100px; ">
                    @include('layouts.car-preview', [
                        'data' => $data
                         ])
                </div>
            </div>
        </div>
    </div>
@endsection
