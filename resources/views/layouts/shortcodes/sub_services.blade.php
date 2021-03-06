@if ($service)
            </div>
        </div>
    </div>
</main>
<section class="sites__types">
    <div class="bg__box"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="as__h1">{{ $service->title_block }}</div>

                <div class="list__items">
                    @foreach ($subServices as $service)
                        <div class="list__items-item2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="body">
                                        <div class="title-box">
                                            <a class="title" href="{{ route('service.show', ['alias' => $service->alias]) }}">
                                                {{ $service->menu_name }}
                                            </a>
                                        </div>

                                        {!! $service->preview !!}

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="price">{!! $service->getPrice() !!}</div>
                                            </div>
                                            <div class="col-6">
                                                <div class="btn-box">
                                                    <a href="{{ route('service.show', ['alias' => $service->alias]) }}" class="btn">ПОДРОБНЕЕ</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12">
@endif
