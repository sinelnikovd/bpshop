<!-- Navbar-->
<nav class="navbar navbar-transparent navbar-fixed-top navbar-color-on-scroll navbar-info">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navigation-index"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="{{ url('/') }}">
                <div class="logo-container">
                    <div class="logo"><img src="{{ asset( 'img/logo-admin.png' ) }}" alt="БИПЭК АВТО Logo" rel="tooltip"></div>
                    <div class="brand">БИПЭК АВТО</div>
                </div></a>
        </div>
        <div class="collapse navbar-collapse" id="navigation-index">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('page', 'company') }}"><i class="material-icons">info_outline</i> О компании</a></li>
                <li><a href="{{ route('product.shop') }}"><i class="material-icons">store</i> Магазин</a></li>
                @if (!Auth::guest())
                    <li><a class="btn btn-white btn-simple btn-just-icon" rel="tooltip" title="В корзине&lt;br&gt;&lt;b&gt;{{ Auth::user()->products()->sum('count') }}&lt;/b&gt; товара" data-placement="bottom" href="{{ route('product.basket') }}" data-html="true"><i class="fa fa-shopping-basket"></i></a></li>
                @endif
                <li><a class="btn btn-white btn-simple btn-just-icon dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Войти</a></li>
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li><a href="{{ route('product.order') }}">Заказы</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar-->
