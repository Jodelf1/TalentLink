<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TalentLink</title>

    <!-- Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Sen:wght@400..800&display=swap" rel="stylesheet">

    <!-- Style -->

    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/MediaQ.css">
    <link rel="stylesheet" href="assets/css/object.css">
</head>
<body class="light-mode">
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] > 0): ?>
        <p>Email ou senha inválidos</p>
    <?php endif; ?>
    <main class="main-login">
        <section class="login-container">
            <section class="photo-login-section relative" id="photo-login-section">
                    <a class="back-link absolute" href="/">Voltar ao website</a>
            </section>
            <section class="login-form-container flex col a-center j-between">
                <img src="./assets/img/logo.png" alt="" class="logo-login">
                <section class="login-content flex col">
                    <section>
                        <h1 class="acess-title">Bem vindo(a) de volta!!</h1>
                        <p class="acess-text">Insira o seu email e sua palavra passe para entrar na sua conta!</p>
                    </section>
                    <form method="post" class="form-login flex col" id="login-form">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Digite o seu email" id="email" required>
                        <label for="senha">Palavra-passe</label>
                        <input type="password" name="password" placeholder="Digite a sua palavra-passe" id="senha" required>
                        <button type="submit" class="button">Login</button>
                    </form>
                    <section class="information-log" id="log-container">
                        
                    </section>
                </section>
                <p> Não tem uma conta? <a href="/register" class="normal-link">Crie uma</a></p>
            
            </section>
        </section>

        <script>
            // Array de cores ou imagens de fundo
            const backgrounds = [
                "url('assets/img/pexels-fauxels-3184162.jpg')", // Gradiente
                "url('assets/img/pexels-fauxels-3183183.jpg')", // Gradiente
                "url('assets/img/pexels-rebrand-cities-581004-1367269.jpg')"
            ];
        
            // Seleciona a section
            const section = document.getElementById("photo-login-section");
        
            // Índice inicial
            let currentIndex = 0;
        
            // Função para alterar o fundo
            function changeBackground() {
                section.style.background = backgrounds[currentIndex]; // Define o fundo
                section.style.backgroundSize = "cover, cover";              // Ajusta o tamanho
                section.style.backgroundPosition = "center, center";         // Centraliza a imagem
        
                // Atualiza o índice
                currentIndex = (currentIndex + 1) % backgrounds.length;
            }
        
            // Altera o fundo a cada 10 segundos
            setInterval(changeBackground, 10000);
        
            // Altera o fundo imediatamente ao carregar a página
            changeBackground();
        </script>
        <script src="/assets/js/log.js"></script>
        <script src="/assets/js/login.js"></script>
        <script src="/assets/js/colorchange.js"></script>
    </main>
</body>
</html>