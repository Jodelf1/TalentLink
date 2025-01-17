<?php
$this->layout('layouts/base', ['title' => 'Home']);
?>

<section class="vagas-formacoes-container flex col">
    <?php foreach ($vagas as $vaga):
         $conteudoLimitado = substr($vaga['vaga']['descricao'], 0, 300) . '...';
        ?>
    <div class="vaga-card">
                    <p class="date-vaga"><?= $vaga['data']?></p>
                    <section class="company-data-container flex row a-center">
                        <img src="./assets/img/sonangolLogo.jpeg" alt="" class="company-icon">
                        <section class="company-data">
                            <p class="company-name"><?= $vaga['nome_empresa']?></p>
                            <p class="recomendation-info"></p>
                        </section>
                    </section>
                    <section class="vaga-information">
                        <a href="/vaga/<?= $vaga['vaga']['id'] ?>" class="vaga-title"><?= $vaga['vaga']['titulo'] ?></a>
                        <p class="vaga-description"><?= $conteudoLimitado ?></p>
                        <p class="vaga-details"><i class="fa-solid fa-business-time"></i> Integral | <i
                                class="fa-solid fa-location-dot"></i> Luanda, Talatona</p>
                        <section class="flex row a-center vaga-application-area">
                            <a href="#" class="btn">Candidatar-se</a>
                            <p class="info"><?= $vaga['n_candidaturas'] ?> Pessoas já se candidataram</p>
                        </section>
                    </section>
                </div>
        <?php endforeach; ?>
                <div class="vaga-card">
                    <p class="date-vaga">Hoje</p>
                    <section class="company-data-container flex row a-center">
                        <img src="./assets/img/sonangolLogo.jpeg" alt="" class="company-icon">
                        <section class="company-data">
                            <p class="company-name">Nome da empresa</p>
                            <p class="recomendation-info">O seu perfil se encaixa com esta vaga</p>
                        </section>
                    </section>
                    <section class="vaga-information">
                        <a href="" class="vaga-title">Vaga para Desenvolvedor de Software</a>
                        <p class="vaga-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quis
                            assumenda eaque enim, a totam. Unde eos, cum veritatis eligendi amet minima omnis! Nihil,
                            ducimus! Ipsam eius quia eligendi perspiciatis.</p>
                        <p class="vaga-details"><i class="fa-solid fa-business-time"></i> Integral | <i
                                class="fa-solid fa-location-dot"></i> Luanda, Talatona</p>
                        <section class="flex row a-center vaga-application-area">
                            <a href="#" class="btn">Candidatar-se</a>
                            <p class="info">32 Pessoas já se candidataram</p>
                        </section>
                    </section>
                </div>
    
</section>
<section class="information-container">
                <div class="information-card">
                    <h1 class="title-information">Alguma coisa</h1>
                </div>
            </section>