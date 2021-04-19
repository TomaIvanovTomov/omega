
<div class="by-brands">
    <div class="container">
        <h1>{{\App\Helper::t("shop_by_brand")}}</h1>
        <div class="brands-wrapper">
            @foreach(\App\Helper::getBrands(12) as $brand)
                <div class="single-brand">
                    <a href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/search?make={{$brand->id}}">
                        <img src="{{$brand->getImage()}}" alt="{{$brand->title}}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
