<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes"/>
    <title>@yield('title', 'Мебель для гостиниц')</title>
    <meta name="description" content="@yield('description', '')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#eee">
    @stack('og')
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="canonical" href="@yield('canonical', request()->url())"/>
</head>
<body>
    <header itemscope="" itemtype="http://schema.org/WPHeader">
        <meta itemprop="headline" content="Веб-студия Красбер в Крыму и Краснодарском крае">
        <meta itemprop="description" content="Создание и seo-продвижение веб-сайтов, настройка рекламы в интернете по всей России">
        <meta itemprop="keywords" content="создание, продвижение, интернет-реклама, крым, краснодар">
        <div class="sticky__menu{{ is_main_page() ? '' : ' sticky__menu-always' }}">
            <div class="container">
                <div class="top__line">
                    <svg class="icon menu">
                        <use xlink:href="{{ asset('img/symbols.svg#menu') }}"></use>
                    </svg>
                    <div class="logo">
                        <a href="{{ route('page.show') }}">
                            <img class="desktop__logo" src="{{ is_main_page() ? asset('img/logo_white.svg') : asset('img/logo_green.svg') }}" data-green-logo="{{ is_main_page() ? asset('img/logo_green.svg'): '' }}" alt="Создание сайта в веб-студии Красбер" title="Веб-студия Красбер" />
                            <img class="mobile__logo" src="{{ asset('img/logo_green.svg') }}" alt="Создание сайта в веб-студии Красбер" title="Веб-студия Красбер" />
                        </a>
                    </div>
                    <!-- /.logo -->
                    @includeWhen($menu->get('menu_header'), 'layouts.menus.header', ['menu' => $menu, 'services' => $services])
                    <a href="tel:89787547499" class="phone__svg">
                        <svg class="phone">
                            <use xlink:href="{{ asset('img/symbols.svg#phone') }}"></use>
                        </svg>
                    </a>
                    <div class="phone__email">
                        <a href="tel:89787547499" title="Позвонить" class="phone__link">
                            <span>8 (978) 754-74-99</span>
                        </a>
                        <a href="mailto:info@krasber.ru" title="Написать на почту">info@krasber.ru</a>
                    </div>
                    <!-- /.phone__email -->
                </div>
                <!-- /.top__line -->
            </div>
        </div>
        @section('slogan')
        @show
    </header>

    @yield('content')

    <section class="footer__contacts">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="row">
                        <div class="col-6 footer__contacts-text">
                            Звоните, пишите, договоримся!
                        </div>
                        <div class="col-6 footer__contacts-messengers">
                            <div class="phone"><a href="tel:89787547499" title="Позвонить">8 (978) 754-74-99</a></div>
                            <div class="email"><a href="mailto:info@krasber.ru" title="Написать на почту">info@krasber.ru</a></div>
                            <div class="f__icons">
                                <a href="https://t.me/nata_ber" target="_blank">
                                    <svg class="icon telegram">
                                        <use xlink:href="{{ asset('img/symbols.svg#telegram') }}"></use>
                                    </svg>
                                </a>
                                <a href="viber://add?number=89787547499" target="_blank">
                                    <svg class="icon viber">
                                        <use xlink:href="{{ asset('img/symbols.svg#viber') }}"></use>
                                    </svg>
                                </a>
                                <a href="skype:live:info_773422" target="_blank">
                                    <svg class="icon skype">
                                        <use xlink:href="{{ asset('img/symbols.svg#skype') }}"></use>
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/krasber_studio/" target="_blank">
                                    <svg class="icon insta">
                                        <use xlink:href="{{ asset('img/symbols.svg#insta') }}"></use>
                                    </svg>
                                </a>
                                <a href="https://www.facebook.com/krasber/" target="_blank">
                                    <svg class="icon facebook">
                                        <use xlink:href="{{ asset('img/symbols.svg#facebook') }}"></use>
                                    </svg>
                                </a>
                                <a href="https://vk.com/krasber" target="_blank">
                                    <svg class="icon vk">
                                        <use xlink:href="{{ asset('img/symbols.svg#vk') }}"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer itemtype="http://schema.org/WPFooter">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="line"></div>
                    <div class="row list__columns">
                        <div class="col__logo">
                            <a href="{{ route('page.show') }}">
                                <img src="{{ asset('img/logo_green.svg') }}" class="logo__green" alt="Создание сайта в веб-студии Красбер" title="Веб-студия Красбер">
                            </a>
                            <div class="copyright">
                                <span itemprop="copyrightYear">2017 - {{ date('Y') }}</span> © Создание и продвижение сайтов. ООО «Красбер», ИНН 9106013479
                            </div>
                        </div>
                        @foreach ($services as $service)
                            <div class="col__service">
                                <div class="title">{{ $service->getMenuName() }}</div>
                                @if ($service->services->count())
                                    <ul>
                                        @foreach ($service->services as $subService)
                                            <li><a href="{{ route('service.show', $subService->alias) }}">{{ $subService->getMenuName() }}</a></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endforeach
                        <div class="col__nav">
                            @includeWhen($menu->get('menu_footer'), 'layouts.menus.footer', ['menu' => $menu])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    
    <div class="notify"></div>

    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
        ym(45495162, "init", {id:45495162,clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true,trackHash:true});
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107358703-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments)};
        gtag('js', new Date());
        gtag('config', 'UA-107358703-1');
    </script>
    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?p=VK-RTRG-224888-EpCh';</script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '235500477021452');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=235500477021452&ev=PageView&noscript=1"/></noscript>
    <!-- End Facebook Pixel Code -->
    <script src="{{ asset('js/app.min.js') }}" defer></script>
</body>
</html>