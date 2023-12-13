<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('index') }}"><img alt="" class="image-logo"
                src="{{asset('images/logobus.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('servicios') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('contacto') }}">Contacto</a>
                </li>
                @auth
                <li class="nav-item text-white pt-2">
                        {{ auth()->user()->name }}
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <a class="text-danger" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="fa fa-sign-out"></i>
                            </a>
                        </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
