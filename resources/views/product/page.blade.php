@extends('layout.base')

@section('content')
<body class="other-page">
    @include('layout.header')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('{{ asset( 'img/bg2.jpg' ) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="brand">
                            <h1>БИПЭК АВТО</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="section section-basic">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Carousel Card-->
                            <div class="card card-raised card-carousel">
                                <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
                                    <div class="carousel slide" data-ride="carousel">
                                        <!-- Indicators-->
                                        <ol class="carousel-indicators">
                                            @foreach($product->images as $key=>$img )
                                                <li class="{{ $key == 0 ? 'active' : '' }}" data-target="#carousel-example-generic" data-slide-to="{{ $key }}"></li>
                                            @endforeach
                                        </ol>
                                        <!-- Wrapper for slides-->
                                        <div class="carousel-inner">
                                            @foreach($product->images as $key=>$img )
                                                <div class="item {{ $key == 0 ? 'active' : '' }}"><img src="{{ asset($img) }}" alt="{{ $product->name }}"></div>
                                            @endforeach
                                        </div>
                                        <!-- Controls--><a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"><i class="material-icons">keyboard_arrow_left</i></a><a class="right carousel-control" href="#carousel-example-generic" data-slide="next"><i class="material-icons">keyboard_arrow_right</i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Carousel Card-->
                        </div>
                        <div class="col-md-5">
                            <div class="title">
                                <h2>{{ $product->name }}</h2>
                            </div>
                            <table class="product-info">
                                <tr>
                                    <td>Цена:</td>
                                    <td><span class="price">{{ number_format($product->price,0,' ',' ') }} тг.</span></td>
                                </tr>
                                <tr>
                                    <td>Категория:</td>
                                    <td>{{ $product->categorie->label }}</td>
                                </tr>
                                <tr>
                                    <td>Производитель:</td>
                                    <td>{{ $product->manufacturer->label }}</td>
                                </tr>
                                <tr>
                                    <td>Для авто:</td>
                                    <td><span class="label label-info">{{ $product->auto->mark->label }} - {{ $product->auto->model }}</span></td>
                                </tr>
                            </table>
                            {{ Form::open(array('route' => 'product.addcart', 'method' => 'POST')) }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-info btn-round btn-block product-btn">В корзину</button>
                            {{ Form::close() }}
                            <div class="title">
                                <h3>Описание</h3>
                            </div>
                            <div class="text">
                                {!! $product->desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
</body>
@endsection