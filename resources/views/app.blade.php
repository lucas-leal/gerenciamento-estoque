<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <title>Gerenciamento de estoque</title>
</head>

<body>
    <main role="main" class="container">
        @yield('content')
    </main>
</body>

</html>
