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
            .botao.-vermelho {
                background: #9B0008;
            }
            .botao.-direita {
                float: right;
            }

            form {
                display: flex;
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
        </style>
    </head>
    <body>
        <div id="container">
            <header>
                <img src="/images/header.jpg" width="100%" />
            </header>
            <div id="menu">
                <a href="/" class="botao -ativo">Entrada</a>
                <a href="/saida" class="botao">Saída</a>
                <div class="botao -cinza -direita">
                    5 vagas disponíveis
                </div>
            </div>
            <form action="/entrada" method="post">
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
            </form>
            <span style="margin-left: 20px">Horário de entrada: 16h20</span>
            <button type="submit" class="botao -ativo -direita">Add Entrada</button>
            <button type="reset" class="botao -vermelho -direita">Cancelar</button>
        </div>
    </body>
</html>
