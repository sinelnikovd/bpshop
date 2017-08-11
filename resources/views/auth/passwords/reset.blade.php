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
                        <form role="form" method="POST" action="{{ route('password.request') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="header header-primary text-center">
                                <h4>Смена пароля</h4>
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
                                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}"><span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                    <input class="form-control" type="password" placeholder="Пароль..." name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="input-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"><span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                    <input class="form-control" type="password" placeholder="Повторите пароль..." name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button class="btn btn-simple btn-primary btn-lg" type="submit">Сменить пароль</button>
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
