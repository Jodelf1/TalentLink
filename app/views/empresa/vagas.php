<?php $this->layout('layouts/empresa', ['title' => 'Vagas | TalentLink']) ?>

<section class="container">
    <h1 class="section-title">Vagas</h1>
    <section>
        <a href="/c/create/vaga" class="mini-action-card">Publicar Vaga</a>
    </section>
</section>
<?php if($vagas){ ?>
<section class="container">
    <h1 class="section-title">Minhas Vagas</h1>
    <section class="vaga-empresa-area flex ">
        <?php foreach($vagas as $vaga):?>
            <section class="vaga-empresa-card col flex">
                <h1 class="vaga-title"><?= $vaga['vaga']['titulo'] ?></h1>
                <section class="description">
                </section>
                <a href="/c/vaga/<?= $vaga['vaga']['id'] ?>">Detalhes</a>
                <p><?= $vaga['n_candidaturas']?> Candidaturas recebidas</p><a href=""></a>
            </section>
        <?php endforeach; ?>
    </section>
</section>
<?php 
}else{?>
<section class="container j-center a-center">
    <h1 class="section-title">Sem vagas publicadas</h1>
    <p class="not-found-text">Ainda não publicou vagas, ou as suas já expiraram!</p>
    <a href="/c/create/vaga" class="not-found-link">Publicar Vaga Agora</a>
</section>
<?php } ?>

