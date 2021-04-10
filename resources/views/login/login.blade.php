<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">

    <title>Gerenciamento de estoque</title>
</head>

<body>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <h4 class="mb-3 text-center">Gerenciamento de estoque</h4>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4 offset-md-4">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('login') is-invalid @enderror">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4 offset-md-4">
                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" class="form-control @error('login') is-invalid @enderror">
                        <div class="invalid-feedback">
                            @error('login')
                                Credenciais inválidas
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ url('js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

</html>
