@extends('partials.header')

@section('header-body')
    {{-- TopMenu --}}
    @if (isset($topMenu) && !empty($topMenu))
        <div class="c-header c-header--top">
            <div class="c-header__body container u-py-0 u-px-4@lg u-px-4@xl">
                <div class="grid">
                    <div class="grid-fit-content u-ml-auto">
                        <nav>
                            <ul class="c-navbar">
                                @foreach ($topMenu as $menuItem)
                                    <li {{$menuItem->attributes}}>
                                        <a class="c-navbar__action" href="{{$menuItem->url}}">{{$menuItem->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Brand area --}}
    <div class="c-header">
        <div class="c-header__body container u-py-3 u-py-1@xs u-py-1@sm u-px-4@lg u-px-4@xl">
            <div class="grid grid-va-middle">
                <div class="grid-auto">
                    <div class="c-header__logo">
                        {!! municipio_get_logotype(get_field('header_logotype', 'option'), get_field('logotype_tooltip', 'option'), true, get_field('header_tagline_enable', 'option')) !!}
                    </div>
                </div>
                <div class="grid-fit-content u-ml-auto hidden-md hidden-lg hidden-xl">
                    <ul class="c-navbar c-navbar--header-widget-links t-familjen-helsingborg t-municipio">
                        <li class="c-navbar__item">
                            <button class="u-nowrap hamburger hamburger--slider menu-trigger validated valid hf-in-range hf-user-valid" type="button" aria-label="Meny" aria-controls="navigation" aria-expanded="true/false" onclick="jQuery(this).toggleClass('is-active');" data-target="#mobile-menu" aria-invalid="false">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- MainMenu --}}
    @if (isset($mainMenu) && !empty($mainMenu))
        <div class="c-header c-header--bottom hidden-xs hidden-sm">
            <div class="c-header__body container u-py-0  u-px-4@lg u-px-4@xl">
                <div class="grid grid-va-middle">
                    <div class="grid-auto">
                        <nav>
                            <ul class="c-navbar">
                                @foreach ($mainMenu as $menuItem)
                                    <li {{$menuItem->attributes}}>
                                        <a class="c-navbar__action {{$menuItem->classes}}" href="{{$menuItem->url}}">{{$menuItem->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                    <div class="grid-fit-content">
                        <nav class="c-navbar">
                            <span class="c-navbar__item">
                                <button class="o-reset-button u-nowrap c-navbar__action js-search-trigger pricon pricon-search toggle-search-top validated valid hf-in-range hf-user-valid" onclick="return false;" type="button" aria-label="Sök" aria-invalid="false"><span class="hidden">Sök</span></button>
                            </span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if (strlen($navigation['mobileMenu']) > 0)
        <nav id="mobile-menu" class="nav-mobile-menu nav-toggle nav-toggle-expand {!! apply_filters('Municipio/mobile_menu_breakpoint','hidden-md hidden-lg'); !!} hidden-print">
            @include('partials.mobile-menu')
        </nav>
    @endif
@stop




