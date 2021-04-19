@php
    use App\Helper;
    use Illuminate\Support\Facades\Lang;
@endphp

<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo-wrapper">
                    <a href="/{{Lang::getLocale()}}"><img class="site-logo" src="{{asset('storage/'.setting('site.logo'))}}"
                                                          alt="{{config('app.name')}}"/></a>
                </div>
            </div>
            <div class="col-sm-6">
                <ul class="header-menu">
                    @foreach(Helper::getHeaderMenuVisiblePages() as $page)
                        <li><a href="/{{Lang::getLocale()}}/{{$page->url}}">{{$page->getTranslatedAttribute('title', Lang::getLocale(), 'en')}}</a></li>
                    @endforeach
                    @if(1==2)
                    <li class="header-menu-more">{{\App\Helper::t('more')}}&nbsp;<i class="fa fa-caret-down"></i>
                        <ul class="sub-menu">
                            @foreach(Helper::getHeaderMorePages() as $page)
                                <li><a href="/{{Lang::getLocale()}}/{{$page->url}}">{{$page->getTranslatedAttribute('title', Lang::getLocale(), 'en')}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="col-sm-3">
                <ul class="profile-options">
                    <li class="language">
                        @if(Lang::getLocale() == 'en')
                            <span>English&nbsp;<i class="fa fa-caret-down"></i></span>
                        @else
                            <span>Arabian&nbsp;<i class="fa fa-caret-down"></i></span>
                        @endif
                        <ul class="lang-sub-menu">
                            @if(Lang::getLocale() == 'en')
                                <li><a href="/ar">Arabian</a></li>
                            @else
                                <li><a href="/en">English</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="wishlist">
                        <a href="#"><i class="fa fa-heart"></i></a>
                    </li>
                    <li class="profile-login">
                        @if ($user = \App\Helper::getCurrentUser())
                            <i class="fa fa-user"></i>(<strong>{{$user->name}}</strong>)
                            <ul class="profile-sub-menu">
                                <li><a href="{{route('logout')}}">Logout</a></li>
                            </ul>
                        @else
                            <i class="fa fa-user"></i>
                            <ul class="profile-sub-menu login-menu">
                                <li><a href="{{route('login')}}">Login</a></li>
                            </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

