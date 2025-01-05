<?php 
if($_SESSION['user']['user_type'] == 'empresa'){
    $this->layout('layouts/empresa', ['title' => 'DashBoard']);
    $destino = "/empresas"; 
}else{
    $this->layout('layouts/base', ['title' => 'Página não encontrada']);
    $destino = "/";
}
?>

<section class="container j-center a-center">
    <h1 class="section-title">Página não encontrada</h1>
    <p class="not-found-text">A página que você está procurando não existe ou foi removida.</p>
    <a href="<?= $destino ?>" class="not-found-link">Voltar para a página inicial</a>
</section>