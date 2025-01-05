<?php 
if($_SESSION['user']['user_type'] == 'empresa'){
    $this->layout('layouts/empresa', ['title' => 'DashBoard']);
}else{
    $this->layout('layouts/base', ['title' => 'Página não encontrada']);
}
?>
<section class="container configuration-container"> 
    <h1 class="section-title">Configurações</h1>
    <section class="config-section">
        <h1 class="config-title">Notificações</h1>
        <form action="" class="config-form">
            <label for="notification">Notificações</label>
            <select name="notification" id="notification">
                <option value="1">Ativadas</option>
                <option value="0">Desativadas</option>
            </select>
            <button type="submit" class="config-button">Guardar</button>
        </form>
    </section>
    <section class="config-section">
        <h1>Aparência</h1>
        <section>
            <label for="theme">Tema</label>
            <select name="theme" id="themeSelect">
                <option value="light">Claro</option>
                <option value="dark">Escuro</option>
            </select>
        </section>
    </section>
    <section class="config-section">
        <h1> Conta e Segurança</h1>
        <section>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" class="config-button">Guardar</button>
        </section>
    </section>
</section>

<script src="assets/js/colormode.js"></script>