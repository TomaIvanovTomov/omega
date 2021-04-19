<div class="section-divider"></div>
<div class="category-products">
    <div class="row">
        <div class="col-sm-12">
            <h5 style="font-weight: 600">{{\App\Helper::t('featured_dealer')}}</h5>
        </div>
        @if($search_products_featured && $search_products_featured[0])
            @foreach($search_products_featured as $product)
                @php
                    $title = $product->getTranslatedAttribute('title', Lang::getLocale(), 'en')
                @endphp
                <div class="col-sm-4">
                    <div class="item">
                        <span class="wishlist-badge <?= $product->isWishlist() ? 'in-wish' : 'not-wish' ?>">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        <i class="fa fa-heart"></i></span>
                        @if($product->type == "New")
                            <span class="new-badge">{{\App\Helper::t('new')}}</span>
                        @endif
                        <div class="image-wrapper">
                            <a href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/product/{{$product->id}}">
                                <img src="{{$product->getImage()}}" alt="{{$title}}">
                            </a>
                        </div>
                        <div class="info-wrapper">
                            <p class="title">{{$title}}</p>
                            <p class="engine-miles">{{$product->engine}} - {{$product->miles}}</p>
                            <p class="price"><span>$</span> {{$product->price}}</p>
                            <p class="manufacturer">{{$product->manufacturer}}</p>
                            <p class="stock">{{$product->available ? \App\Helper::t("in_stock") : \App\Helper::t("no_stock")}}</p>
                            <hr>
                            <p class="brand">
                                <span>{{$product->brand}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-sm-12" style="margin-top: 30px">
            <h5 style="font-weight: 600">{{\App\Helper::t('your_search_results')}}</h5>
        </div>
        @if($search_products && $search_products[0])
            @foreach($search_products as $product)
                @php
                    $title = $product->getTranslatedAttribute('title', Lang::getLocale(), 'en')
                @endphp
                <div class="col-sm-4">
                    <div class="item">
                        <span class="wishlist-badge <?= $product->isWishlist() ? 'in-wish' : 'not-wish' ?>">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        <i class="fa fa-heart"></i></span>
                        @if($product->type == "New")
                            <span class="new-badge">{{\App\Helper::t('new')}}</span>
                        @endif
                        <div class="image-wrapper">
                            <img src="{{$product->getImage()}}" alt="{{$title}}">
                        </div>
                        <div class="info-wrapper">
                            <p class="title">{{$title}}</p>
                            <p class="engine-miles">{{$product->engine}} - {{$product->miles}}</p>
                            <p class="price"><span>$</span> {{$product->price}}</p>
                            <p class="manufacturer">{{$product->manufacturer}}</p>
                            <p class="stock">{{$product->available ? \App\Helper::t("in_stock") : \App\Helper::t("no_stock")}}</p>
                            <hr>
                            <p class="brand">
                                <span>{{$product->brand}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
