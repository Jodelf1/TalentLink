<?php $currentUrl = strtok($_SERVER['REQUEST_URI'], '?'); ?>
<header class="flex row a-center j-between company-header">
    <section class="search-form-container">
        <form action="" class="search-form flex row">
            <input type="text" name="search" id="search" placeholder="Pesquisar vagas, categorias, formações...">
            <button type="submit"><i class="fa-solid fa-search"></i></button>
        </form>
    </section>
    <section class="flex row a-center">
        <a href="/c/perfil" class="user-card">
            <img src="/assets/img/profile-example.jpg" alt="" class="user-img">
            <section class="flex col">
                <h1 class="user-name">Nome da empresa</h1>
                <p class="user-email"><?php echo $_SESSION['user']['email'] ?></p>
            </section>
        </a>
        <a class="notification-container relative" id="notification-button">
            <i class="fa-solid fa-bell notification-icon"></i>
            <span class="notification-count absolute">1</span>
        </a>
    </section>
</header>

<section class="sidebar flex col company-sidebar j-between">
    <section>
        <section class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
        </section>
        <nav class="sidebar-menu">
            <ul class="flex col">
                <a href="/c" class="sidebar-link <?= $currentUrl == '/c' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Dashboard</a>
                <a href="/c/perfil" class="sidebar-link <?= $currentUrl == '/c/perfil' ? 'ativo' : '' ?> "><i class="fa-solid fa-user"></i> Perfil</a>
                <a href="/c/vagas" class="sidebar-link <?= $currentUrl == '/c/vagas' || $currentUrl == '/c/create/vaga' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
                <a href="/c/candidaturas" class="sidebar-link <?= $currentUrl == '/candidaturas' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Candidaturas</a>
                <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
            </ul>
        </nav>
    </section>
    <a href="/logout" class="log-out-button"><i class="fa-solid fa-arrow-right-from-bracket"></i>Terminar Sessão</a>
</section>