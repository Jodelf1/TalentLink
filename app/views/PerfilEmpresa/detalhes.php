<!-- views/PerfilEmpresa/detalhes.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Empresa - <?php echo htmlspecialchars($perfil['nome_empresa']); ?></title>
</head>
<body>
    <h1>Detalhes da Empresa: <?php echo htmlspecialchars($perfil['nome_empresa']); ?></h1>
    
    <ul>
        <li><strong>Nome da Empresa:</strong> <?php echo htmlspecialchars($perfil['nome_empresa']); ?></li>
        <li><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($perfil['descricao'])); ?></li>
        <li><strong>Localização:</strong> <?php echo htmlspecialchars($perfil['localizacao']); ?></li>
        <li><strong>Site:</strong> <a href="<?php echo htmlspecialchars($perfil['site']); ?>" target="_blank"><?php echo htmlspecialchars($perfil['site']); ?></a></li>
        <li><strong>Telefone:</strong> <?php echo htmlspecialchars($perfil['telefone']); ?></li>
    </ul>

    <a href="/empresas">Voltar para a lista de empresas</a>
</body>
</html>
