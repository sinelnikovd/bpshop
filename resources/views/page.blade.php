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
                    <div class="title">
                        <h2 class="text-center">{{ $page->title }}</h2>
                    </div>
                    {!! $page->text !!}


                </div>
            </div>
        </div>
        @include('layout.footer')
    </div>
    @include('layout.script')
    </body>

@endsection