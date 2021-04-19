@extends('layouts.app')

@section('content')
    <div class="section-divider"></div>
    <div class="container" id="product-page">
        <div class="row">
            <div class="col-sm-7">
                <div class="form-group">
                    <h1 class="title">{{$product->title}}</h1>
                </div>
                <div class="car-page-carousel owl-carousel" data-slider-id="1">
                    <img src="{{$product->getImage()}}" alt="{{$product->title}}">
                </div>
<!--                <div class="owl-thumbs" data-slider-id="1">
                    <button class="owl-thumb-item">slide 1</button>
                    <button class="owl-thumb-item">slide 2</button>
                    <button class="owl-thumb-item">slide 3</button>
                    <button class="owl-thumb-item">slide 4</button>
                </div>-->
            </div>
            <div class="col-sm-5">
                <div class="info-wrapper">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2 class="price">${{$product->price}}</h2>
                            @include("pages.enquire")
                        </div>
                        <div class="col-sm-12">
                            <h4 class="stock">{{\App\Helper::t("in_stock")}}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <style>
                    .props {
                        margin-top: 10px;
                        margin-bottom: 10px;
                        border-bottom: 1px solid #d5d5d5;
                        padding-top: 5px;
                        padding-bottom: 15px;
                    }
                </style>
                <div class="row" style="font-size: 17px">
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Miles:</strong>&nbsp;&nbsp;{{$product->miles}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Engine:</strong>&nbsp;&nbsp;{{$product->engine}} Kw
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Exterior:</strong>&nbsp;&nbsp;{{\App\Color::where('id', $product->exterior_color_id)->first()->title}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Exterior:</strong>&nbsp;&nbsp;{{\App\Color::where('id', $product->interior_color_id)->first()->title}}
                        </div>
                    </div>
                    @if($product->drive_id)
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Drive:</strong>&nbsp;&nbsp;{{\App\Drive::where('id', $product->drive_id)->first()->title}}
                        </div>
                    </div>
                    @endif
                    @if($product->door_id)
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Doors:</strong>&nbsp;&nbsp;{{\App\Door::where('id', $product->door_id)->first()->title}}
                        </div>
                    </div>
                    @endif
                    @if($product->fuel)
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Fuel:</strong>&nbsp;&nbsp;{{\App\Fuel::where('id', $product->fuel)->first()->title}}
                        </div>
                    </div>
                    @endif
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Transmission:</strong>&nbsp;&nbsp;{{$product->transmission_id}}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Condition:</strong>&nbsp;&nbsp;{{\App\Condition::where('id', $product->condition_id)->first()->title}}
                        </div>
                    </div>
<!--                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Manufacturer:</strong>&nbsp;&nbsp;{{$product->manufacturer}}
                        </div>
                    </div>-->
                    <div class="col-sm-4">
                        <div class="props">
                            <strong>Features:</strong>&nbsp;&nbsp;
                            @foreach($product->types() as $type)
                                <?php $type = \App\Type::where('id', $type->type_id)->first() ?>

                                <p><?= $type->title ?></p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" style="margin-top: 60px">
                <div class="description">
                    <h1>{{\App\Helper::t('description')}}</h1>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container carousel-product-page">
        <hr>
        <div class="section-divider"></div>
        @include('layouts.carousel')
        <div class="section-divider"></div>
    </div>
@endsection
