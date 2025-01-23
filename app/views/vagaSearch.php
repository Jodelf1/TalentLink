<?php
$this->layout('layouts/base', ['title' => "Resultado para $pesquisa"]);
?>
<section class="vagas-formacoes-container flex col">
    <?php 
        if($regiao && $pesquisa){
            $msg = "A mostrar resultados de \"{$pesquisa}\" em $regiao";
        }elseif ($pesquisa) {
            $msg = "A mostrar resultados de \"{$pesquisa}\"";
        }elseif ($regiao) {
            $msg = "A mostrar Vagas de emprego em $regiao";
        }else{
            $msg = "Nenhuma vaga encontrada";
        }
    ?>
    <div class="vaga-card">
        <h1 class="section-title"><?php echo $msg ?></h1>
    </div>
    <?php foreach ($vagas as $vaga):
         $conteudoLimitado = substr($vaga['vaga']['descricao'], 0, 300) . '...';
        ?>
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
        
    
</section>
<section class="information-container">
                <div class="information-card">
                    <h1 class="title-information">Alguma coisa</h1>
                </div>
            </section>