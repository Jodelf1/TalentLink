<?php
    $currentUrl = strtok($_SERVER['REQUEST_URI'], '?');
?>

<section class="sidebar flex col ">
        <section class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
        </section>

        <?php if(isset($_SESSION['user'])){ #SE EXISTE UMA SESSÃO INICIADA ?>
        

        <?php if($_SESSION['user']['user_type'] === "candidato"){ #SE É UM CANDIDATO ?>
        <section class="user-card relative" id="user-card">
            <img src="/assets/img/profile-example.jpg" alt="" class="user-img">
            <section class="user-info flex col">
                <h1 class="user-name">Nome do candidato</h1>
                <p>Meu CV</p>
            </section>
            <nav id="user-options-container" class="user-options-container flex col">
                <a href="/cv" class="user-option">Meu CV</a>
                <a href="/config" class="user-option">Configurações</a>
                <a href="/logout" class="user-option">Sair</a>
            </nav>
        </section>

        <nav class="sidebar-menu">
            <ul class="flex col">
                <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
                <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
                <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
                <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
            </ul>
        </nav>

       <?php }elseif ($_SESSION['user']['user_type'] === "formador") { #SE É UM FORMADOR ?>

        <section class="user-card relative" id="user-card">
            <img src="/assets/img/profile-example.jpg" alt="" class="user-img">
            <section class="user-info flex col">
                <h1 class="user-name">Nome do formador</h1>
                <p>Meu perfil</p>
            </section>
            <nav id="user-options-container" class="user-options-container flex col">
                <a href="/cv" class="user-option">Meu Perfil</a>
                <a href="/config" class="user-option">Configurações</a>
                <a href="/logout" class="user-option">Sair</a>
            </nav>
        </section>

        <nav class="sidebar-menu">
            <ul class="flex col">
                <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
                <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
                <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
                <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
            </ul>
        </nav>

      <?php } ?>
        
        <?php }else{ #SE NÃO EXISTE UMA SESSÃO INICIADA
            ?>
            <section class="acess-links flex col">
                <p>Registre-se ou inicie sessão para ter acesso a tudo que a TalentLink pode oferecer.</p>
                <a href="/register" class="btn">Registar-se</a>
                <a href="/login" class="btn login">Iniciar Sessão</a>
            </section>

            <nav class="sidebar-menu">
                <ul class="flex col">
                    <a href="/" class="sidebar-link <?= $currentUrl == '/' ? 'ativo' : '' ?> "><i class="fa-solid fa-house"></i> Página inicial</a>
                    <a href="/vagas" class="sidebar-link <?= $currentUrl == '/vagas' ? 'ativo' : '' ?> "><i class="fa-solid fa-briefcase"></i> Vagas</a>
                    <a href="/formacoes" class="sidebar-link <?= $currentUrl == '/formacaoes' ? 'ativo' : '' ?> ""><i class="fa-solid fa-book-open"></i> Formações</a>
                    <a href="/tag" class="sidebar-link <?= $currentUrl == '/tag' ? 'ativo' : '' ?> ""><i class="fa-solid fa-tags"></i> Categorias</a>
                    <a href="/config" class="sidebar-link <?= $currentUrl == '/config' ? 'ativo' : '' ?> ""><i class="fa-solid fa-gear"></i> Configurações</a>
                </ul>
            </nav>

        <?php  } ?>
        

        <section class="social-media flex col">
            <p>Siga-nos nas redes sociais</p>
            <section class="social-media-icons flex row">
                <a href="#" class="social-media-icon"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="social-media-icon"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="social-media-icon"><i class="fa-brands fa-twitter"></i></a>
            </section>
        </section>

        <section class="more-links">
            <a href="">Sobre a TalentLink</a> |
            <a href="">Contactos</a>
        </section>

        <section class="sidebar-footer">
            <p>© 2025 TalentLink</p>
            <p>Developed by <a href="https://marimbaz.com">Marimba'z</a></p>
        </section>
    </section>
    <script src="/assets/js/user.js"></script>
</section>