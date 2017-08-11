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
                    <table class="table table-striped">
                        <caption>Ваша корзина</caption>
                        @if(!$baskets->isEmpty())
                            <thead>
                                <tr>
                                    <td class="td-name">Название</td>
                                    <td class="td-count">Количество</td>
                                    <td class="td-price">Цена</td>
                                    <td class="rm"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $s = 0;
                                @endphp
                                @foreach( $baskets as $basket)
                                    @php
                                        $s += $basket->product->price * $basket->count;
                                    @endphp
                                        <tr>
                                            <td class="td-name">{{ $basket->product->name }}</td>
                                            <td class="td-count">{{ $basket->count }}</td>
                                            <td class="td-price"><strong>{{ number_format($basket->product->price * $basket->count,0,' ',' ') }}</strong> тг.</td>
                                            <td class="rm">
                                                {{ Form::open(array('route' => 'product.removecart', 'method' => 'POST')) }}
                                                <input type="hidden" name="id" value="{{ $basket->product->id }}">
                                                <button type="submit" class="btn btn-info btn-simple"><span class="material-icons">close</span></button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                @endforeach
                                <tr>
                                    <td class="td-name"></td>
                                    <td class="td-count"><strong>Итого:</strong></td>
                                    <td class="td-price"><strong>{{ number_format($s,0,' ',' ') }}</strong> тг.</td>
                                    <td class="rm"></td>
                                </tr>
                            </tbody>
                        @else
                            <tr><td>Корзина пуста</td></tr>
                        @endif
                    </table>
                    <div class="btn-wrap">
                        <a class="btn btn-info btn-round" href="{{ route("product.shop") }}">Продолжить покупки</a>
                        @if(!$baskets->isEmpty())
                            <a class="btn btn-success btn-round" href="{{ route("product.addorder") }}">Оформить заказ</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
</body>

@endsection