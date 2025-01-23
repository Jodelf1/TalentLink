<?php
$this->layout('layouts/base', ['title' => 'Home']);
?>

<section class="vagas-formacoes-container flex col">
    <div class="vaga-card">
        <p class="date-vaga"><?= $vaga['data']?></p>
        <section class="company-data-container flex row a-center">
            <img src="<?= $vaga['img_empresa']?>" alt="" class="company-icon">
            <section class="company-data">
                <p class="company-name"><?= $vaga['nome_empresa']?></p>
                <p class="recomendation-info"></p>
            </section>
        </section>
        <section class="vaga-information">
            <p class="vaga-title"><?= $vaga['vaga']['titulo'] ?></p>
            <p class="vaga-description"><?= $vaga['vaga']['descricao'] ?></p>
            <p class="vaga-details"><i class="fa-solid fa-business-time"></i> Integral | <i class="fa-solid fa-location-dot"></i> Luanda, Talatona</p>
            <section class="flex row a-center vaga-application-area">
                <p class="info"><?= $vaga['n_candidaturas'] ?> Pessoas já se candidataram</p>
            </section>
        </section>

    </div>  
    <div class="vaga-card">
        <form action="/vaga/<?= $vaga['vaga']['id']?>/apply" method="post">
            <button type="submit" class="btn">Candidatar-se</button>
        </form>
    </div> 
</section>
<section class="information-container">
    <div class="information-card">
        <h1 class="title-information">Alguma coisa</h1>
    </div>
</section>