<section class="sidebar flex col j-between">
    <section class="logo">
        <img src="/assets/img/logo.png" alt="Logo">
    </section>
    <nav class="sidebar-menu">
        <ul class="flex col">
            <a href="/empresas/profile" class="user-card candidato-card">
                <img src="/assets/img/profile-example.jpg" alt="" class="user-img">
                <section class="user-info flex col">
                    <h1 class="user-name">Nome da empresa</h1>
                    <p class="user-email"><?php echo $_SESSION['user']['email'] ?></p>
                </section>
            </a>
            <a href="/empresas/profile" class="sidebar-link <?= $currentUrl == '/empresas' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
            <a href="/empresas/vagas" class="sidebar-link <?= $currentUrl == '/empresas/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
            <a href="/" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
            <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
        </ul>
    </nav>
    <a href="/logout" class="log-out-button"><i class="fa-solid fa-arrow-right-from-bracket"></i>Terminar Sessão</a>
</section>