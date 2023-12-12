<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('index') }}"><img alt="" class="image-logo"
                src="images/logobus.png"></a>
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
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
