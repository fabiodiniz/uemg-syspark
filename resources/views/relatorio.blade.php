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
                <a href="/entrada" class="botao">Entrada</a>
                <a href="/saida" class="botao">Saída</a>
                <a href="/relatorio" class="botao -ativo">Relatório</a>
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
            <form action="/saida" method="post">
                {{ csrf_field() }}
                <div class="container">
                    @if (count($automoveis) < 1)
                        <h2>Nenhum automóvel estacionado.</h2>
                    @endif
                    @foreach ($automoveis as $automovel)
                        @if ($automovel->horario_saida)
                            <div class="campo botao -cinzaclaro">
                        @else
                            <div class="campo botao -cinza">
                        @endif
                            {{ $automovel->placa }}
                            <little>Modelo: {{ $automovel->modelo }}</little>
                            <little>Cor: {{ $automovel->cor }}</little>
                            <little>Entrada: {{ $automovel->horario_entrada }}</little>
                            <little>Saída: {{ $automovel->horario_saida }}</little>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </body>
</html>
