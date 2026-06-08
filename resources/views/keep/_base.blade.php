<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> 🦧 Keepintinho</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: system-ui, -apple-system, "Segoe UI", sans-serif;
            max-width: 720px;
            margin: 0 auto;
            padding: 24px 16px;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.5;
        }

        h1 {
            text-align: center;
            color: #444;
        }

        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 16px 0;
        }

        a {
            color: #1a73e8;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Barra de ações no topo (Adicionar nota | Lixeira) */
        .barra {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 12px 0;
        }

        /* Notas */
        .nota {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 12px;
            word-break: break-word;
        }

        .nota small {
            color: #777;
        }

        .nota .acoes {
            margin-top: 8px;
            font-size: 18px;
        }

        /* Botões de ação dentro da nota (restaurar / excluir) parecem links */
        .acoes form {
            display: inline;
            margin: 0;
        }

        .acoes a,
        .acoes button {
            background: none;
            border: none;
            padding: 0;
            margin-right: 12px;
            font-family: inherit;
            font-size: 14px;
            color: inherit;
            cursor: pointer;
        }

        .acoes a:hover,
        .acoes button:hover {
            text-decoration: underline;
        }

        /* Mensagem de feedback */
        .mensagem {
            background-color: #e6f4ea;
            border: 1px solid #b7e1c4;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 16px;
        }

        /* Formulários */
        form {
            margin: 16px 0;
        }

        textarea {
            width: 100%;
            min-height: 100px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            resize: vertical;
        }

        input[type="color"] {
            margin: 8px 0;
            width: 48px;
            height: 36px;
            border: 1px solid #ccc;
            border-radius: 8px;
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #1a73e8;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-size: 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1666c1;
        }

        /* Erros */
        .erros {
            background-color: #fdecea;
            border: 1px solid #f5c2c0;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 16px;
            color: #b3261e;
        }

        .erros ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>
    <h1> 🦧 Keepintinho</h1>
    <hr>
    @yield('conteudo')
</body>
</html>
