<?php $this->layout('layouts/empresa', ['title' => 'DashBoard']) ?>

<section class="container">
    <section>
        
    </section>
    <ul>
        <li><strong>Nome da Empresa:</strong> <?php echo htmlspecialchars($perfil['nome_empresa']); ?></li>
        <li><strong>Descrição:</strong> <?php echo nl2br(htmlspecialchars($perfil['descricao'])); ?></li>
        <li><strong>Localização:</strong> <?php echo htmlspecialchars($perfil['localizacao']); ?></li>
        <li><strong>Site:</strong> <a href="<?php echo htmlspecialchars($perfil['site']); ?>" target="_blank"><?php echo htmlspecialchars($perfil['site']); ?></a></li>
        <li><strong>Telefone:</strong> <?php echo htmlspecialchars($perfil['telefone']); ?></li>
    </ul>
</section>

