<?php
    $currentUrl = strtok($_SERVER['REQUEST_URI'], '?');
    
    if(isset($_SESSION['user'])){ 
?>

<section class="sidebar flex col ">
        <section class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
        </section>
        <a href="" class="user-card">
            <img src="/assets/img/profile-example.jpg" alt="" class="user-img">
            <section class="user-info flex col">
                <h1 class="user-name">Nome do candidato</h1>
                <p>Meu CV</p>
            </section>
        </a>

        <nav class="sidebar-menu">
            <ul class="flex col">
                <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
                <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
                <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
                <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
                <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
            </ul>
        </nav>
        <p>developed by <a href="https://Marimbaz.com">Marimbaz</a></p>
    </section>

<?php }else{ ?>

<section class="sidebar flex col">
        <section class="logo">
            <img src="assets/img/logo.png" alt="Logo">
        </section>
        <a href="/login" class="user-card candidato-card">
            <img src="assets/img/profile-example.jpg" alt="" class="user-img">
            <section class="user-info flex col">
                <h1 class="user-name">Iniciar Sessão</h1>
            </section>  
        </a>
    <nav class="sidebar-menu">
        <ul class="flex col">
            <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
            <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
            <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
            <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
            <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
        </ul>
    </nav>
</section>

<?php } ?>    