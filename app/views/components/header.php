<header class="flex row a-center j-between">
    <section class="logo">
        <img src="assets/img/logo.png" alt="Logo">
    </section>
    <section class="search-form-container">
        <form action="" class="search-form flex row">
            <input type="text" name="search" id="search" placeholder="Pesquisar vagas, categorias, formações...">
            <button type="submit"><i class="fa-solid fa-search"></i></button>
        </form>
    </section>
    <a class="notification-container relative" id="notification-button">
        <i class="fa-solid fa-bell notification-icon"></i>
        <span class="notification-count absolute">1</span>
    </a>
</header>

<?php
    $currentUrl = strtok($_SERVER['REQUEST_URI'], '?');
    
    if(isset($_SESSION['user'])){ 
?>

<section class="sidebar flex col j-between">
    <nav class="sidebar-menu">
        <ul class="flex col">
            <a href="" class="user-card candidato-card">
                <img src="assets/img/profile-example.jpg" alt="" class="user-img">
                <section class="user-info flex col">
                    <h1 class="user-name">Nome do candidato</h1>
                    <p class="user-email"><?php echo $_SESSION['user']['email'] ?></p>
                </section>
            <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
            <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
            <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
            <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
            <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
        </ul>
    </nav>
    <a href="/logout" class="log-out-button"><i class="fa-solid fa-arrow-right-from-bracket"></i>Terminar Sessão</a>
</section>

<?php }else{ ?>

<section class="sidebar flex col j-around">
    <nav class="sidebar-menu">
        <ul class="flex col">
            <a href="/login" class="user-card candidato-card">
                <img src="assets/img/profile-example.jpg" alt="" class="user-img">
                <section class="user-info flex col">
                    <h1 class="user-name">Iniciar Sessão</h1>
                </section>  
            </a>
            <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
            <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
            <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
            <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
            <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
        </ul>
    </nav>
</section>

<?php } ?>    