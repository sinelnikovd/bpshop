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
                        <caption>Ваши заказы</caption>
                        @if(!$orders->isEmpty())
                            <thead>
                            <tr>
                                <td class="td-name">Название</td>
                                <td class="td-count">Количество</td>
                                <td class="td-price">Цена</td>
                                <td class="td-status">Статус</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach( $orders as $order)
                                    <tr>
                                        <td class="td-name">{{ $order->product->name }}</td>
                                        <td class="td-count">{{ $order->count }}</td>
                                        <td class="td-price">{{ $order->price }}</td>
                                        <td class="td-status">{{ ['Ожидает подтверждения', 'Подтвержден', 'Выполнен'][$order->status] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <tr><td>Вы ещё не сделали ни одного заказа</td></tr>
                        @endif
                    </table>
                    <div class="btn-wrap"><a class="btn btn-info btn-round" href="{{ route("product.shop") }}">Продолжить покупки</a></div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
</body>

@endsection