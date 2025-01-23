<?php
$this->layout('layouts/base', ['title' => 'Formações']);
?>

<section class="formacoes-container flex col">
    <?php foreach ($formacoes as $formacao):
        $descricaoLimitada = substr($formacao['descricao'], 0, 300) . '...';
    ?>
    <div class="formacao-card" style="margin-bottom: 20px;">
        <p class="date-formacao"><?= date('d/m/Y', strtotime($formacao['data_inicio'])) ?> - <?= date('d/m/Y', strtotime($formacao['data_fim'])) ?></p>
        <section class="formador-data-container flex row a-center">
            <img src="./assets/img/formadorIcon.png" alt="" class="formador-icon">
            <section class="formador-data">
                <p class="formador-name"><?= $formacao['formador_nome'] ?></p>
                <p class="especialidades-info"><?= $formacao['especialidades'] ?></p>
            </section>
        </section>
        <section class="formacao-information">
            <a href="/formacao/<?= $formacao['id'] ?>" class="formacao-title"><?= $formacao['titulo'] ?></a>
            <p class="formacao-description"><?= $descricaoLimitada ?></p>
            <p class="formacao-details"><i class="fa-solid fa-location-dot"></i> <?= $formacao['localizacao'] ?></p>
            <section class="flex row a-center formacao-application-area">
                <a href="<?= $formacao['link'] ?>" class="btn" target="_blank">Acessar Formação</a>
                <p class="info"><?= $formacao['participantes'] ?> Pessoas já participaram</p>
            </section>
        </section>
    </div>
    <?php endforeach; ?>
</section>

<section class="information-container">
    <div class="information-card">
        <h1 class="title-information">Descubra mais formações e oportunidades</h1>
    </div>
</section>
