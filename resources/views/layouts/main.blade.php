<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <!-- link fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <!-- link css do Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <!-- link css da aplicação-->
        <link rel="stylesheet" href="/css/styles.css">
        <!-- link js-->
        <script type="text/javascript" src="/js/scripts.js"></script>
    </head>
    <body>
        <header>
            <nav id="navbar" class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="/img/logo_hdcevents.png" alt="logo" title="Home">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/ ">Eventos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/events/create">Criar Eventos</a>
                            </li>
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="/dashboard">Meus Eventos</a>
                                </li>
                                <li class="nav-item">
                                    <form action="/logout" method="POST">
                                        @csrf
                                        <a href="/logout"
                                        class="nav-link"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                        >
                                        Sair
                                        </a>
                                    </form>
                                </li>
                            @endauth
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="/login">Entrar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">Cadastrar</a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container-fluid">
                @if(session('msg'))
                    <div class="alert alert-info" role="alert">{{session('msg')}}</div>
                @endif
                @yield('content')
            </div>
        </main>
        <footer>
            <p>HDC Events &copy;2023</p>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
