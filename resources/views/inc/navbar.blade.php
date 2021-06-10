@section('navbar')
<nav class="navbar navbar-expand-md navbar-light bg-light rounded-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">
                    eshop
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto text-center">
                      <li class="nav-item {{ Route::is('catalog') ? 'active' : '' }}">
                        <a class="nav-link" href="{{route('catalog')}}">каталог<span class="sr-only">(current)</span></a>
                      </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto text-center">
                            @auth
                            <li class="nav-item mr-3  d-flex justify-content-center align-items-center">
                                <a class="nav-link d-flex justify-content-center align-items-center" href="{{route('cart')}}">
                                <i aria-hidden="true" class="fas fa-shopping-basket"></i>
                                <span id="cart-pill" class="ml-2 badge badge-success badge-pill">{{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}} ₽</span>
                                </a>
                            </li>
                            @endauth
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('вход') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('регистрация') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('profile')}}">
                                        профиль
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('выход') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
@show