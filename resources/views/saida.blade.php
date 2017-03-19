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
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            div, input, form, a, img {
                box-sizing: border-box;
            }
            #container {
                width: 802px;
                margin: auto;
            }
            #menu {
                margin: 10px 0;
            }
            .botao {
                display: inline-block;
                padding: 20px;
                border-radius: 5px;
                background: #47972C;
                color: #FFF;
                text-decoration: none;
                border: none;
                margin: 5px;
                cursor: pointer;
            }
            .botao.-ativo {
                background: #8BB939;
                font-weight: bold;
            }
            .botao.-cinza {
                background: #737373;
            }
            .botao.-cinzaclaro {
                background: #D2D2D2;
                color: #000;
                font-weight: bold;
            }
            .botao.-vermelho {
                background: #9B0008;
            }
            .botao.-direita {
                float: right;
            }

            form > .container {
                display: flex;
                flex-flow: wrap;
            }
            .campo {
                flex-grow: 1;
                padding: 10px;
            }
            .campo label {
                font-weight: bold;
            }
            .campo input {
                display: block;
                width: 100%;
                border-radius: 5px;
                padding: 10px;
                border: 1px solid #B4B4B4;
                background: #D2D2D2;
            }
            .campo.botao input {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <header>
                <img src="/images/header.jpg" width="100%" />
            </header>
            <div id="menu">
                <a href="/" class="botao">Entrada</a>
                <a href="/saida" class="botao -ativo">Saída</a>
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
                        <label class="campo botao -cinzaclaro">
                          <input type="radio" name="carro" value="{{ $automovel->id }}"> {{ $automovel->placa }} ({{ $automovel->modelo }}/{{ $automovel->cor }})
                        </label>
                    @endforeach
                </div>
                <button type="submit" class="botao -ativo -direita">Confirmar saída</button>
                <button type="reset" class="botao -vermelho -direita">Cancelar</button>
            </form>
        </div>
    </body>
</html>
