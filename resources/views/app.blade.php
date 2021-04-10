<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <title>Gerenciamento de estoque</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('products.list') }}">Produtos</a>
                <a class="nav-item nav-link" href="{{ route('stock.add.form') }}">Adicionar estoque</a>
                <a class="nav-item nav-link" href="{{ route('stock.remove.form') }}">Remover estoque</a>
            </div>
        </div>
    </nav>
    <br>
    <main role="main" class="container">
        @yield('content')
    </main>

    <script src="{{ url('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

</html>
