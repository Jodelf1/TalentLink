<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Perfil da Empresa</title>
    <style>
        /* Estilo geral */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fb;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #007BFF;
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        /* Estilo do formulário */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        /* Adicionando imagem de fundo sutil */
        .form-container::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('https://via.placeholder.com/600x250'); /* Substituir por sua imagem */
            background-position: center;
            background-size: cover;
            opacity: 0.1;
            border-radius: 10px;
            z-index: -1;
        }

        .form-group {
            margin-bottom: 18px;
            position: relative;
        }

        label {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 8px;
            display: block;
            font-weight: 500;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 2px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            color: #333;
            box-sizing: border-box;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: #007BFF;
            background-color: #f0f8ff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            background-color: #004085;
        }

        /* Estilo de texto e links */
        a {
            color: #007BFF;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            font-size: 1em;
            text-align: center;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .form-container {
                width: 90%;
                padding: 25px;
            }

            h1 {
                font-size: 1.8em;
                margin-bottom: 18px;
            }
        }

    </style>
</head>
<body>

    <h1>Criar Perfil da Empresa</h1>

    <div class="form-container">
        <form action="/empresas/create" method="POST">
            
            <div class="form-group">
                <label for="nome_empresa">Nome da Empresa:</label>
                <input type="text" name="nome_empresa" id="nome_empresa" required placeholder="Digite o nome da empresa">
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" required placeholder="Descreva sua empresa"></textarea>
            </div>

            <div class="form-group">
                <label for="localizacao">Localização:</label>
                <input type="text" name="localizacao" id="localizacao" placeholder="Exemplo: Rua X, nº Y, Cidade">
            </div>

            <div class="form-group">
                <label for="site">Site:</label>
                <input type="url" name="site" id="site" placeholder="https://www.exemplo.com">
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" placeholder="(XX) XXXX-XXXX">
            </div>

            <div class="form-group">
                <button type="submit">Criar Perfil</button>
            </div>
        </form>
        <a href="/empresas">Voltar à página anterior</a>
    </div>

</body>
</html>

