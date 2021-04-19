<script>
    var csrf_token = '<?= csrf_token() ?>';
</script>
<div class="container">
    <div class="carousel-recommend">
        <h1>{{\App\Helper::t("recommended_for_you")}}</h1>
        <div class="owl-carousel recommended_carousel">
            @foreach(\App\Helper::getProducts(10) as $product)
                @php $title = $product->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en') @endphp
                <div class="item">
                    <span class="wishlist-badge <?= $product->isWishlist() ? 'in-wish' : 'not-wish' ?>">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                    <i class="fa fa-heart"></i></span>
                    @if($product->type == "New")
                        <span class="new-badge">{{\App\Helper::t('new')}}</span>
                    @endif
                    <div class="image-wrapper">
                        <a href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/product/{{$product->id}}"><img src="{{$product->getImage()}}" alt="{{$title}}"></a>
                    </div>
                    <div class="info-wrapper">
                        <p class="title">{{$title}}</p>
                        <p class="engine-miles">{{$product->engine}} - {{$product->miles}}</p>
                        <p class="price"><span>$</span> {{$product->price}}</p>
                        <p class="manufacturer">{{$product->manufacturer}}</p>
                        <p class="stock">{{$product->available ? \App\Helper::t("in_stock") : \App\Helper::t("no_stock")}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
