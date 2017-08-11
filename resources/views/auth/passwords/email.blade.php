@extends('layout.base')

@section('content')
<body class="signup-page">
    @include('layout.header')
    <div class="wrapper">
        <div class="header header-filter" style="background-image: url('{{ asset( 'img/bg2.jpg' ) }}');">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="card card-signup">
                            <form role="form" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}
                                <div class="header header-primary text-center">
                                    <h4>Востановить пароль</h4>
                                </div>
                                <div class="content">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}"><span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <input class="form-control" type="text" placeholder="Email..."  name="email" value="{{ old('email') }}" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="footer text-center">
                                    <button class="btn btn-simple btn-primary btn-lg" type="submit">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @include('layout.footer')
        </div>
    </div>
    @include('layout.script')
    </body>
@endsection
