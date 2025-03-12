<?php
$this->layout('layouts/base', ['title' => 'Formações, Webinars, Cursos e workshops']);
?>

<section class="formacoes-container flex col">
    <?php foreach ($formacoes as $formacao):
        $descricaoLimitada = substr($formacao['descricao'], 0, 300) . '...';
    ?>
    
    <div class="formacao-card">
        <img src="./assets/img/upload/5ca2f70823e6bb6b26ac03dc57392d13e0c27ab05b20d9aa1679f61629e8521b.jpg"
                        class="formacao-img" alt="">

        <section class="formacao-content flex col j-between">
            <section>
                <a href="/formacao/" class="formacao-title"><?= $formacao['titulo'] ?></a>
                <section class="posted-by flex row a-center">
                    <p> publicado por</p>
                    <a href="#" class="formador-link flex row a-center">
                        <img src="./assets/img/profile-example.jpg" alt="" class="formador-icon">
                        <p><?= $formacao['formador_nome'] ?></p>
                    </a> •
                    <p><?= $formacao['especialidades'] ?></p>
                </section>
            </section>

            <p class="formacao-description"><?= $descricaoLimitada ?> </p>
            <p class="formacao-details"><i class="fa-solid fa-location-dot"></i> <?= $formacao['localizacao'] ?> | <i class="fa-solid fa-calendar-days"></i> 23 de Dezembro de 2025 | </p>
            <section class="flex row a-center formacao-application-area">
                <a href="" class="btn" target="_blank">Acessar Formação</a>
                <p class="info"><?= $formacao['participantes'] ?> Pessoas já confirmaram a presença</p>
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
