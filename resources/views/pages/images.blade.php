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
                        <h3>{{\App\Helper::t("seller_car_images")}}</h3>
                        <p>{{\App\Helper::t('seller_car_images_text')}}</p>
                    </div>
                    <div class="form-wrapper">
                        <form method="post"
                              action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/sell-car-upload"
                              id="car_images" enctype="multipart/form-data">
                            @csrf
                            @foreach($data as $key => $value)
                                <input type="hidden" name="{{$key}}" value="{{$value}}" />
                            @endforeach
                            <div class="form-group">
                                <input multiple type="file" id="images_input" name="images[]" />
                            </div>
                            <div class="form-group" style="margin-top: 20px; text-align: center">
                                <button id="car-images-submit" class="theme-btn">{{\App\Helper::t('next')}}</button>
                            </div>
                            <input type="hidden" name="car-year" value="{{$data['year']}}"/>
                            <input type="hidden" name="car-make" value="{{$data['make']}}"/>
                            <input type="hidden" name="car-model" value="{{$data['model']}}"/>
                            <input type="hidden" name="carengine" value="{{$data['engine']}}"/>
                            <input type="hidden" name="car-price" value="{{$data['car-price']}}"/>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6" style="background:whitesmoke;padding: 50px 100px;">

                    @include('layouts.car-preview', [
                            'data' => $data
                        ])
                </div>
            </div>
        </div>
    </div>
@endsection
