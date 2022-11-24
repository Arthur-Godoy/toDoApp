<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<body class="bg-dark">
    <header>
        <div class="col-md-4 offset-4">
            <div class="mt-3 mb-4">
                <h1 class="title fw-bold d-inline">TODO</h1>
                <nav class="fw-bold d-inline offset-4 ps-3 ">
                    @guest
                        <a class="nav-link d-inline me-2" href="{{ route('login') }}">Login</a>
                        <a class="nav-link d-inline" href="{{ route('register') }}">Cadastrar</a>
                    @endguest
                    @auth
                        <p class="fs-5 ms-2 me-2 d-inline"><ion-icon name="contact"></ion-icon>{{ auth()->user()->name }}</p>
                        <form action="/logout" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outlined d-inline fs-5 btn-sm">
                                <ion-icon name="close-circle"></ion-icon>
                            </button>
                        </form>
                    @endauth
                </nav>
            </div>
            <form action="{{ route('create') }}" method="POST">
                @csrf
                <input class="rounded px-5 py-3 shadow-lg" type="text" name="content" placeholder="Criar nova tarefa..." required>
            </form>
        </div>
    </header>
    <div class="col-md-4 offset-4">
        @yield('content')
    </div>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/RubaXa/Sortable/Sortable.min.js">
</body>
</html>
