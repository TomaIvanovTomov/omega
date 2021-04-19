<div class="section-divider"></div>
<div class="category-products-list">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-12">
                <h5 style="font-weight: 600">{{\App\Helper::t('featured_dealer')}}</h5>
            </div>
        </div>
        @if(isset($search_products_featured[0]) && $search_products_featured[0])
            @foreach($search_products_featured as $product)
                @php
                    $title = $product->getTranslatedAttribute('title', Lang::getLocale(), 'en')
                @endphp
                <div class="col-sm-12">
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="image-wrapper">
                                    <a href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/product/{{$product->id}}">
                                        <img src="{{$product->getImage()}}" alt="{{$title}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="info-wrapper">
                                    <span class="wishlist-badge <?= $product->isWishlist() ? 'in-wish' : 'not-wish' ?>">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <i class="fa fa-heart"></i></span>
                                    @if($product->type == "New")
                                        <span class="new-badge">{{\App\Helper::t('new')}}</span>
                                    @endif
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
                    </div>
                </div>
            @endforeach
        @endif
            <div class="col-sm-12" style="margin-top: 30px">
                <div class="col-sm-12">
                    <h5 style="font-weight: 600">{{\App\Helper::t('your_search_results')}}</h5>
                </div>
            </div>
        @if($search_products && $search_products[0])
            @foreach($search_products as $product)
                @php
                    $title = $product->getTranslatedAttribute('title', Lang::getLocale(), 'en')
                @endphp
                <div class="col-sm-12">
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="image-wrapper">
                                    <a href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/product/{{$product->id}}">
                                        <img src="{{$product->getImage()}}" alt="{{$title}}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="info-wrapper">
                                    <span class="wishlist-badge <?= $product->isWishlist() ? 'in-wish' : 'not-wish' ?>">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    <i class="fa fa-heart"></i></span>
                                    @if($product->type == "New")
                                        <span class="new-badge">{{\App\Helper::t('new')}}</span>
                                    @endif
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
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
