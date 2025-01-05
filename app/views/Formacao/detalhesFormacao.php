<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Formação</title>
</head>
<body>
<h1>Detalhes do Formador</h1>
<p><strong>Nome:</strong> <?= htmlspecialchars($perfil['nome_formador']) ?></p>
<p><strong>Bio:</strong> <?= nl2br(htmlspecialchars($perfil['bio'])) ?></p>
<p><strong>Especialidades:</strong> <?= nl2br(htmlspecialchars($perfil['especialidades'])) ?></p>
<p><strong>Localização:</strong> <?= htmlspecialchars($perfil['localizacao']) ?></p>
<p><strong>Contato:</strong> <?= htmlspecialchars($perfil['contato']) ?></p>
<a href="/formador/create">Voltar</a>

</body>
</html>
