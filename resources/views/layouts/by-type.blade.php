<style>
    .by-type h1 {
        color: #7B7F9E;
        text-align: center;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 3%;
    }
    .by-type .single-type{
        padding: 20px;
        text-align: center;
        font-weight: 600;
    }
</style>
<div class="by-type">
    <div class="container">
        <h1>{{\App\Helper::t("shop_by_type")}}</h1>
        <div class="owl-carousel homepage-product-type owl-theme">
            @foreach(\App\Helper::getTypes() as $type)
                @php $title = $type->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en') @endphp
                <div class="item">
                    <div class="single-type">
                        <a href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/search?coupe={{$type->id}}">
                            <img src="{{$type->getImage()}}" alt="{{$title}}" title="{{$title}}">
                        </a>
                        <p>{{$title}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
