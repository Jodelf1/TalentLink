<?php $this->layout('layouts/empresa', ['title' => 'DashBoard']) ?>

<section class="container">
    <h1 class="section-title">DashBoard</h1>
    <section class="action-card-container flex row">
        <a class="action-card" href="/empresas/vagas">
            <i class="fa-solid fa-briefcase"></i>
            <section>
                <h2>Vagas</h2>
                <p>Gerencie suas vagas</p>
            </section>
        </a>
        <a class="action-card" href="/empresas/perfil">
            <i class="fa-solid fa-house"></i>
            <section>
                <h2>Perfil</h2>
                <p>Gerencie seu perfil</p>
            </section>
        </a>
        <a class="action-card" href="/empresas/candidaturas">
            <i class="fa-solid fa-book-open"></i>
            <section>
                <h2>Candidaturas</h2>
                <p>Analise as candidaturas ás vagas</p>
            </section>
        </a>
    </section>
</section>