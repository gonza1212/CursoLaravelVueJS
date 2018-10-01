<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebApps de Atras Para Adelante</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default">
              <a class="navbar-brand" href="#">EIP 2018</a>
              <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="/viandas">Viandas <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/personas">Personas <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/pedidos">Pedidos <span class="sr-only">(current)</span></a>
                  </li>
                </ul>
              </div>
            </nav>
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>