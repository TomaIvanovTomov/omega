@extends('layouts.app')

@section('content')
<script>
    window.minPrice = '<?= $price_range[0]->min ?>'
    window.maxPrice = '<?= $price_range[0]->max ?>'
    window.currentMinPrice = '<?= ($min_price != 0 ? $min_price : $price_range[0]->min) ?>'
    window.currentMaxPrice = '<?= ($max_price != 0 ? $max_price : $price_range[0]->max) ?>'
</script>
<div class="section-divider"></div>
<div class="container search-page">
    <div class="row">
        <div class="col-sm-12 search-badges-row">
            <form action="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/search">
            @foreach($types as $t)
                <span class="type-badge">
                    <input type="hidden" value="{{$t['id']}}">
                    <strong>{{$t['title']}}</strong>
                    ({{$t->productsCount()}})</span>
            @endforeach
                <input type="hidden" name="single-type" value="" />
            </form>
        </div>
        <div class="col-sm-3">
            @include('layouts.search--bar')
        </div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-3">
                    <span class="title">
                    {{\App\Helper::t('filter_search_results')}}
                    </span>
                </div>
                <div class="col-sm-5 text-center" style="padding-top: 30px">
                    <span class="found">
                        @php
                            $count = isset($search_products_featured[0]) && $search_products_featured[0] ? count($search_products_featured) : 0;
                        @endphp
                    {{count($search_products) + $count}} {{\App\Helper::t('results_found')}}
                    </span>
                </div>
                <div class="col-sm-2 grid-wrapper">
                    @if($grid == 2)
                        <i class="fa fa-th"></i>
                        <input type="hidden" value="1" name="grid">
                        <input type="hidden" value="{{\Illuminate\Support\Facades\Lang::getLocale()}}" name="lang">
                    @else
                        <i class="fa fa-list-ul"></i>
                        <input type="hidden" value="2" name="grid">
                        <input type="hidden" value="{{\Illuminate\Support\Facades\Lang::getLocale()}}" name="lang">
                    @endif
                </div>
                <div class="col-sm-2 text-right">
                    <select name="search_order" id="search_order" onchange="setOrder(this)">
                        <option <?= $order == 1 ? "selected" : "" ?> value="1">{{\App\Helper::t('price_asc')}}</option>
                        <option <?= $order == 2 ? "selected" : "" ?> value="2">{{\App\Helper::t('price_desc')}}</option>
                        <option <?= $order == 3 ? "selected" : "" ?> value="3">{{\App\Helper::t('mileage_asc')}}</option>
                        <option <?= $order == 4 ? "selected" : "" ?> value="4">{{\App\Helper::t('mileage_desc')}}</option>
                        <option <?= $order == 5 ? "selected" : "" ?> value="5">{{\App\Helper::t('year_asc')}}</option>
                        <option <?= $order == 6 ? "selected" : "" ?> value="6">{{\App\Helper::t('year_desc')}}</option>
                    </select>
                </div>
            </div>
            @php
            $view = $grid == 1 ? "layouts.products-grid" : "layouts.products-list";
            @endphp
            @include($view, [
                'search_products' => $search_products,
                'search_products_featured' => $search_products_featured
            ])
        </div>
    </div>
</div>
@endsection
