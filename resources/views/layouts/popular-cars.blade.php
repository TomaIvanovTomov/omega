<div class="popular-cars">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>{{\App\Helper::t("pop_used_cars")}}</h1>
            </div>
            @foreach(\App\Helper::getPopularCars() as $k => $car)
            @php
            $title = $car->getTranslatedAttribute('title', Lang::getLocale(), 'en')
            @endphp
            <div class="col-sm-3">
                <a class="pop-car" href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/product/{{$car->id}}">{{$title}}</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
