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
                        <div class="col-md-3">
                            {{ Form::open(array('route' => 'product.shop', 'method' => 'GET')) }}
                                <div class="title">
                                    <h3>Производители</h3>
                                </div>
                                @foreach($manufacturers as $ch)
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox("man[]", $ch->id, $mans != null ? in_array($ch->id, $mans) : false ) }}
                                            {{ $ch->label }}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="title">
                                    <h3>Категории</h3>
                                </div>
                                @foreach($categories as $ch)
                                    <div class="checkbox">
                                        <label>
                                            {{ Form::checkbox("cat[]", $ch->id,  $cats != null ? in_array($ch->id, $cats) : false ) }}
                                            {{ $ch->label }}
                                        </label>
                                    </div>
                                @endforeach
                                <div class="title">
                                    <h3>Автомобиль</h3>
                                </div>
                                <select id="select" multiple="multiple" name="aut[]">
                                    @foreach($autos as $item)
                                        <option value="{{ $item->id }}" {{ $auts != null ? in_array($item->id, $auts) ? 'selected="selected"' : '' : '' }}>{{ $item->mark->label }} - {{ $item->model }}</option>
                                    @endforeach
                                </select>
                                <hr>
                                <button class="btn btn-info btn-round btn-block" type="submit">Применить</button>
                            {{ Form::close() }}
                        </div>
                        <div class="col-md-9">
                            <ul class="product-wrap product-wrap_shop">
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

                            <div class="pagination-wrap">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
    <script src="{{ asset( 'js/jquery.sumoselect.min.js' ) }}"></script>
    <script>
        $(function () {
            $('#select').SumoSelect({placeholder: 'Выберите авто'});
        });
    </script>
    @include('layout.modal')
</body>
@endsection