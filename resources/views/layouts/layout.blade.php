<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ark4Fotos</title>
    <link rel="stylesheet" href=" {{ asset('css/myStyles.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/hover/hover.css') }}">
    <link rel="stylesheet" href="{{ asset('plugin/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://csshake.surge.sh/csshake.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
    <script src="{{ asset('plugin/fancybox/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</head>
<body class="fondo2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary animated fadeInDown">
        <a class="navbar-brand" href="#">Ark4Fotos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item activo">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home"></i> Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('albumes.index') }}"><i class="fa fa-images"></i> Albumes de fotos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('foto.index') }}"><i class="fa fa-camera"></i> Fotos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('musica.canciones') }}"><i class="fa fa-music"></i> Musica</a>
                </li>

                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" action="{{ route('foto.show') }}">
                <input class="form-control mr-sm-2" type="search" placeholder="Buscar Foto" aria-label="Search" id="txtBuscar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-3" id="busqueda">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Resultado de la busqueda</h3>
                    </div>

                    <div class="card-body">
                        <div class="row" id="resultados">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                @yield('contenido')
            </div>
        </div>
    </div>
</body>
</html>