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
                        <form class="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="header header-primary text-center">
                                <h4>Войти</h4>
                            </div>
                            <div class="content">
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
                                    <div class="passre"><a class="text-info" href="{{ route('password.request') }}">Забыли пароль?</a></div>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                                    </label>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button class="btn btn-simple btn-primary btn-lg" type="submit">Войти</button>
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
