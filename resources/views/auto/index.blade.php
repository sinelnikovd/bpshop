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
                    <div class="col-md-4">
                        <div class="title">
                            <h3>Выбери своё авто</h3>
                        </div>
                        <ul class="mark-wrap mark-wrap_autos">
                            @forelse($marks as $mark)
                                <li><a href="{{ route("auto.index", $mark->id ) }}"><img src="{{ asset($mark->badge) }}"></a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="col-md-8 autos-wrap">
                        @forelse($autos as $auto)
                            <div class="card" style="background-image: url('{{ asset( $auto->image ) }}');">
                                <div class="title">
                                    <h3><span>{{ $auto->mark->label }}-{{ $auto->model }}</span></h3>
                                </div><a class="btn btn-danger btn-round" href="{{ route("auto.page", $auto->id ) }}">Посмотреть</a>
                            </div>
                        @empty
                            <p class="not-found">Нет авто</p>
                        @endforelse
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