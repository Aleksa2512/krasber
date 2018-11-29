@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)
@push('og')
<meta property="og:title" content="{{ $page->title }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->getUri() }}">
@if ($page->image)
    <meta property="og:image" content="{{ asset($page->image->path) }}">
@else
    <meta property="og:image" content="{{ asset('img/logo_green.svg') }}">
@endif
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:site_name" content="Веб-студия Красбер в Крыму и Краснодарском крае">
    <meta property="og:locale" content="ru_RU">
@endpush
@section('content')

    <section class="header contact__form-box">
        <div class="bg__box"></div>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="contact__form">
                        <div class="wrap">
                            <div class="desc">
                                <div class="as__h1">Заказать услугу</div>
                                <p>Вы можете бесплатно  получить аудит вашего сайта. Вас это не к чему не обязывает.</p>
                            </div>
                            @include('layouts.forms.order_service', ['services' => $services])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <ul itemscope="" itemtype="http://schema.org/BreadcrumbList">
                        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            <a href="{{ route('page.show') }}">Главная</a>
                            <meta itemprop="position" content="1">
                        </li>
                        <li itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
                            {{ $page->name }}
                            <meta itemprop="position" content="2">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <h1>{{ $page->name }}</h1>
                    {!! $page->text !!}
                </div>
            </div>
        </div>
    </main>

@endsection