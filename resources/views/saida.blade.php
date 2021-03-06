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
                <a href="/saida" class="botao -ativo">Saída</a>
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
            <form action="/saida" method="post">
                {{ csrf_field() }}
                @if (count($automoveis) < 1)
                    <h2>Nenhum automóvel estacionado.</h2>
                @else
                    <div class="container">
                        @foreach ($automoveis as $automovel)
                            <label class="campo botao -cinzaclaro">
                              <input type="radio" name="carro" value="{{ $automovel->id }}"> {{ $automovel->placa }} ({{ $automovel->modelo }}/{{ $automovel->cor }})
                            </label>
                        @endforeach
                    </div>
                    <button type="submit" class="botao -ativo -direita">Confirmar saída</button>
                    <button type="reset" class="botao -vermelho -direita">Cancelar</button>
                @endif
            </form>
        </div>
    </body>
</html>
