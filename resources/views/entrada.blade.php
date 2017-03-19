<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SYSPARK</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/syspark.css">
    </head>
    <body>
        <div id="container">
            <header>
                <img src="/images/header.jpg" width="100%" />
            </header>
            <div id="menu">
                <a href="/entrada" class="botao -ativo">Entrada</a>
                <a href="/saida" class="botao">Saída</a>
                <a href="/relatorio" class="botao">Relatório</a>
                <div class="botao -cinza -direita">
                    @if ($vagasDisponiveis > 1)
                        {{ $vagasDisponiveis }} vagas disponíveis
                    @elseif ($vagasDisponiveis == 1)
                        {{ $vagasDisponiveis }} vaga disponível
                    @else
                        Nenhuma vaga disponível
                    @endif
                </div>
            </div>
            <form action="/entrada" method="post">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($vagasDisponiveis < 1)
                    <h2>Não há vagas disponíveis.</h2>
                @else
                    <div class="container">
                        {{ csrf_field() }}
                        <div class="campo">
                            <label for="placa">Placa:</label>
                            <input
                                id="placa"
                                name="placa"
                                type="text">
                        </div>
                        <div class="campo">
                            <label for="modelo">Modelo:</label>
                            <input
                                id="modelo"
                                name="modelo"
                                type="text">
                        </div>
                        <div class="campo">
                            <label for="cor">Cor:</label>
                            <input
                                id="cor"
                                name="cor"
                                type="text">
                        </div>
                    </div>
                    <button type="submit" class="botao -ativo -direita">Confirmar entrada</button>
                    <button type="reset" class="botao -vermelho -direita">Limpar</button>
                @endif
            </form>
        </div>
    </body>
</html>
