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
    <section class="vaga-empresa-area">
        <?php foreach($vagas as $vaga):?>
                    <a href="/c/vaga/<?php echo $vaga['id'] ?>"
                        class="vaga-empresa-card col flex f-center">
                        <img src="/assets/img/" alt="" class="newsletter-background">
                        <h2 class="assunto hide-mobile"></h2>
                        <section class="description">
                            <section class="titulo t-center">
                                <h1><?= $vaga['titulo'] ?></h1>
                            </section>
                        </section>
                    </a>
        <?php endforeach; ?>
    </section>
</section>
<?php 
}else{?>
<section class="container j-center a-center">
    <?= var_dump($vagas) ?>
    <h1 class="section-title">Sem vagas publicadas</h1>
    <p class="not-found-text">Ainda não publicou vagas, ou as suas já expiraram!</p>
    <a href="/c/create/vaga" class="not-found-link">Publicar Vaga Agora</a>
    <?= $_SESSION['user']['id']?>
</section>
<?php } ?>

