<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🦧 Keepintinho </title>
    <style>
        * { box-sizing: border-box; }

        body {
            font-family: Arial, Helvetica, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #f4f4f4;
            color: #333;
        }

        h1 { color: #444; }

        hr { border: none; border-top: 1px solid #ccc; margin: 16px 0; }

        a { color: #2a8c57; text-decoration: none; }
        a:hover { text-decoration: underline; }

        textarea, input[type="color"] {
            display: block;
            margin: 8px 0;
        }

        textarea {
            width: 100%;
            height: 70px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-family: inherit;
        }

        button, input[type="submit"] {
            background: #2a8c57;
            color: #fff;
            border: none;
            padding: 8px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 0.95em;
        }
        button:hover, input[type="submit"]:hover { background: #20663f; }

        /* cada nota */
        .nota {
            padding: 12px;
            margin: 10px 0;
            border-radius: 6px;
            color: #fff;
            text-shadow: 0 1px 2px rgba(0,0,0,0.4);
            word-break: break-word;
        }

        .nota small { display: block; margin-top: 6px; opacity: 0.9; font-size: 0.8em; }

        /* botoes de editar/apagar dentro da nota ficam discretos */
        .nota a,
        .nota button {
            background: rgba(255,255,255,0.85);
            color: #333;
            text-shadow: none;
            padding: 2px 7px;
            border-radius: 4px;
            font-size: 0.95em;
        }
        .nota form { display: inline; }
    </style>
</head>
<body>
    <h1>🦧 keepintinho</h1>
    <hr>
    @yield('conteudo')
</body>
</html>
