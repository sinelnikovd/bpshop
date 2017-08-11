@extends('layout.base')

@section('content')
<body class="index-page">
    @include('layout.header')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('{{ asset( 'img/bg2.jpg' ) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="brand">
                            <h1>БИПЭК АВТО</h1>
                            <h3>Группа Компаний «БИПЭК АВТО — АЗИЯ АВТО» — крупнейший холдинг на автомобильном рынке Казахстана.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="section section-basic">
                <div class="container">
                    <div class="title">
                        <h2>Выбери своё авто</h2>
                    </div>
                    <ul class="mark-wrap">
                        @foreach($marks as $mark)
                            @if($mark->badge)
                                <li><a href="{{ route("auto.index", $mark->id) }}"><img src="{{ $mark->badge }}"></a></li>
                            @endif
                        @endforeach
                    </ul>
                    <!-- Carousel Card-->
                    <div class="card card-raised card-carousel">
                        <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
                            <div class="carousel slide" data-ride="carousel">
                                <!-- Indicators-->
                                <ol class="carousel-indicators">
                                    <li class="active" data-target="#carousel-example-generic" data-slide-to="0"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                </ol>
                                <!-- Wrapper for slides-->
                                <div class="carousel-inner">
                                    <div class="item active"><img src="img/ac/1.jpg" alt="Awesome Image"></div>
                                    <div class="item"><img src="img/ac/2.jpg" alt="Awesome Image"></div>
                                    <div class="item"><img src="img/ac/3.jpg" alt="Awesome Image"></div>
                                </div>
                                <!-- Controls--><a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><i class="material-icons">keyboard_arrow_left</i></a><a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><i class="material-icons">keyboard_arrow_right</i></a>
                            </div>
                        </div>
                    </div>
                    <!-- End Carousel Card-->
                    <div class="title">
                        <h2>Автозапчасти</h2>
                    </div>
                    <ul class="product-wrap">
                        @forelse($products as $product)
                            <li>
                                <div class="product-inner"><a href="{{ route('product.page', $product->id) }}">
                                        <div class="product-preview" style="background-image: url('{{ asset($product->images[0]) }}');"></div></a>
                                    <h4><a href="{{ route('product.page', $product->id) }}">{{ $product->name }}</a></h4>
                                    <p><strong>{{ number_format($product->price,0,' ',' ') }} тг.</strong></p>
                                    {{ Form::open(array('route' => 'product.addcart', 'method' => 'POST')) }}
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-info btn-round"><i class="fa fa-shopping-basket"></i> В корзину</button>
                                    {{ Form::close() }}
                                </div>
                            </li>
                        @empty
                            <li><p>Нет товаров</p></li>
                        @endforelse
                    </ul>
                    <div class="title">
                        <h2>Филиальная сеть</h2>
                    </div>
                    <div id="map"></div>
                    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
                    <script type="text/javascript">
                        ymaps.ready(init);
                        function init() {
                            var map = new ymaps.Map("map", {
                                center: [48.42286983, 66.54289063],
                                zoom: 5,
                                controls: ['smallMapDefaultSet']
                            });

                            map.geoObjects.add(
                                new ymaps.Placemark([49.97774321, 82.62687501], {
                                    hintContent: 'Усть-Каменогорск'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([50.42684289, 80.20416499], {
                                    hintContent: 'Семей'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([52.29399402, 76.93398053], {
                                    hintContent: 'Павлодар'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([51.73815080, 75.34096295], {
                                    hintContent: 'Экибастуз'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([49.80172912, 73.11004686], {
                                    hintContent: 'Караганда'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([51.12006771, 71.45111131], {
                                    hintContent: 'Астана'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([53.27313941, 69.35272264], {
                                    hintContent: 'Кокшетау'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([53.21066999, 63.59724704], {
                                    hintContent: 'Костанай'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([50.30551071, 57.13757365], {
                                    hintContent: 'Актобе'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([51.21204273, 51.35140324], {
                                    hintContent: 'Уральск'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([47.09105730, 51.90533919], {
                                    hintContent: 'Атырау'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([43.64520434, 51.16507065], {
                                    hintContent: 'Актау'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([44.82865508, 65.50873070], {
                                    hintContent: 'Кызылорда'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([42.31980911, 69.57300997], {
                                    hintContent: 'Шымкент'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([42.89600291, 71.35279512], {
                                    hintContent: 'Тараз'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([43.20769618, 76.64323653], {
                                    hintContent: 'Алматы'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([45.01638582, 78.40860022], {
                                    hintContent: 'Талдыкорган'
                                }));

                            map.geoObjects.add(
                                new ymaps.Placemark([50.33950763, 83.48915373], {
                                    hintContent: 'Риддер'
                                }));
                        }
                    </script>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
    @include('layout.modal')
</body>
@endsection