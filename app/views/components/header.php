<header class="flex row">
    <section class="search-form-container">
        <form action="" class="search-form flex row">
            <input type="text" name="search" id="search" placeholder="Pesquisar vagas, categorias, formações...">
            <button type="submit"><i class="fa-solid fa-search"></i></button>
        </form>
        <section class="notification-container">
            <a href="#" class="notification"><i class="fa-solid fa-bell"></i></a>
            <span class="notification-count">1</span>
        </section>
    </section>
</header>

<?php if(isset($_SESSION['user'])){ ?>

<section class="sidebar flex col j-between">
    <div class="logo">
        <img src="assets/img/logo.png" alt="Logo">
    </div>
    <nav class="sidebar-menu">
        <ul class="flex col">
            <a href="" class="user-card candidato-card">
                <img src="assets/img/profile-example.jpg" alt="" class="user-img">
                <section class="user-info flex col">
                    <h1 class="user-name">Nome do Utilizador</h1>
                    <p class="user-email"><?php echo $_SESSION['user']['email'] ?></p>
                </section>  
            </a>
            <a href="" class="sidebar-link ativo"><i class="fa-solid fa-house"></i> Página inicial</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-briefcase"></i> Vagas</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-book-open"></i> Formações</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-tags"></i> Categorias</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-gear"></i> Configurações</a>
        </ul>
    </nav>
    <a href="/logout" class="log-out-button"><i class="fa-solid fa-arrow-right-from-bracket"></i>Terminar Sessão</a>
</section>

<?php }else{ ?>

<section class="sidebar flex col j-between">
    <div class="logo">
        <img src="assets/img/logo.png" alt="Logo">
    </div>
    <nav class="sidebar-menu">
        <ul class="flex col">
            <a href="/login" class="user-card candidato-card">
                <img src="assets/img/profile-example.jpg" alt="" class="user-img">
                <section class="user-info flex col">
                    <h1 class="user-name">Iniciar Sessão</h1>
                </section>  
            </a>
            <a href="" class="sidebar-link ativo"><i class="fa-solid fa-house"></i> Página inicial</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-briefcase"></i> Vagas</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-book-open"></i> Formações</a>
            <a href="" class="sidebar-link"><i class="fa-solid fa-tags"></i> Categorias</a>
        </ul>
    </nav>
</section>

<?php } ?>    