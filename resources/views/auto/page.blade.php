@extends('layout.base')

@section('content')
    <body class="other-page">
    @include('layout.header')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('{{ asset($auto->image) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="brand">
                            <h1>{{ $auto->mark->label }} - {{ $auto->model }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main main-raised">
            <div class="section section-basic">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="text">
                                {!! $auto->desc !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="label label-danger auto-label">от <span>
                                    @php
                                        echo number_format($auto->price,0,' ',' ');
                                    @endphp
                                </span>тг.</div>
                            <a class="auto-price-list" href="{{ asset($auto->pdf) }}">Скачать прайс лист<span class="material-icons">file_download</span></a>
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