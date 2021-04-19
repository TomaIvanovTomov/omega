@php
use App\Helper;

@endphp

<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-md-offset-1">
                <h3>{{\App\Helper::t('behaviour')}}</h3>
                @foreach(\App\Helper::getFooterPages("Behaviour") as $page)
                    <a class="footer-page" href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/{{$page->url}}">{{$page->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</a>
                @endforeach
            </div>
            <div class="col-sm-2">
                <h3>{{\App\Helper::t('about_us')}}</h3>
                @foreach(\App\Helper::getFooterPages("About Us") as $page)
                    <a class="footer-page" href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/{{$page->url}}">{{$page->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</a>
                @endforeach
            </div>
            <div class="col-sm-2">
                <h3>{{\App\Helper::t('help')}}</h3>
                @foreach(\App\Helper::getFooterPages("Help") as $page)
                    <a class="footer-page" href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/{{$page->url}}">{{$page->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</a>
                @endforeach</div>
            <div class="col-sm-2">
                <h3>{{\App\Helper::t('more')}}</h3>
                @foreach(\App\Helper::getFooterPages("More") as $page)
                    <a class="footer-page" href="/{{\Illuminate\Support\Facades\Lang::getLocale()}}/{{$page->url}}">{{$page->getTranslatedAttribute('title', \Illuminate\Support\Facades\Lang::getLocale(), 'en')}}</a>
                @endforeach
            </div>
            <div class="col-sm-2">
                <img src="{{asset('storage/'.setting('site.logo'))}}" />
            </div>
            <div class="col-sm-12">
                <p class="copy-right">{{\App\Helper::t('copy_rights')}}</p>
            </div>
        </div>
    </div>
</div>
