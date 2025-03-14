<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent-Link - Página inicial</title>

    <!-- Icones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Sen:wght@400..800&display=swap"
        rel="stylesheet">

    <!-- Style -->

    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/homeStyle.css">
    <link rel="stylesheet" href="assets/css/homeMediaQ.css">
    <link rel="stylesheet" href="assets/css/MediaQ.css">
    <link rel="stylesheet" href="assets/css/object.css">
</head>

<body class="light-mode ">
    <header class=""> 
        <section class="hide-mobile menu-desktop flex row j-between a-center">
            <img src="./assets/img/logo.png" alt="" class="logo">
            <div class="flex row a-center gap-2">
                <nav class="flex row gap-2 menu-desktop-links">
                    <a href="/vagas">Vagas</a>
                    <a href="/formacoes">Formações</a>
                    <a href="/sobre">Sobre</a>
                    <a href="/meucv">Meu CV</a>
                </nav>

                <?php if(isset($_SESSION['user'])){ #SE EXISTE UMA SESSÃO INICIADA ?>

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

                    
                <?php }else{ #SE NÃO EXISTE UMA SESSÃO INICIADA ?>

                <div class="flex row a-center gap-2">
                    <a href="/login" class="btn login">Entrar</a>
                    <a href="/register" class="btn">Criar Conta</a>
                </div>

                <?php } ?>
            </div>
        </section>
        <section class="hide-desktop menu-mobile flex row a-center">
            <img src="./assets/img/logo.png" alt="" class="logo-mobile">
            <div class="menu">
                <i class="fas fa-bars"></i>
            </div>
        </section>
    </header>
    <main>
        <section class="hero">
            <div class="hero-text">
                <h1>Conectamos talentos e oportunidades!</h1>
                <p>Seja você um <strong>recrutador em busca do candidato ideal</strong> ou um <strong>profissional pronto para dar o próximo passo na carreira</strong>, a TalentLink facilita essa conexão. Atualmente, temos [X] vagas de emprego abertas em diversas áreas, esperando por você.</p>
            </div>
            <div class="hero-search-form-container">
                <form class="hero-search-form" action="/vagas/search">
                    <section class="search-input flex row">
                        <i class="fa-solid fa-search"></i>
                        <input type="text" name="search" id="search"
                            placeholder="Pesquisar vagas, categorias, formações...">
                    </section>
                    <section class="search-select flex row">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="location" id="location" placeholder="Na Região...">
                    </section>
                    
                    <button type="submit">Pesquisar</button>
                </form>
            </div>
        </section>
        <section class="user-types-container flex row j-center a-center">
            <h1>A plataforma ideal para encontrar empregos, contratar talentos e divulgar formações!</h1>
            <div class="user-types flex row gap-2">
                <div class="user-type-card cp-card">
                    <img src="./assets/img/empresa.png" alt="">
                    <h2>Empresas</h2>
                    <p>Anuncie vagas e encontre os melhores talentos!</p>
                </div>
                <div class="user-type-card">
                    <img src="./assets/img/candidato.png" alt="">
                    <h2>Candidatos</h2>
                    <p>Encontre a vaga dos seus sonhos e dê o próximo passo na sua carreira!</p>
                </div> 
                <div class="user-type-card f-card">
                    <img src="./assets/img/formadores.png" alt="">
                    <h2>Formadores</h2>
                    <p>Divulgue formações e atraia mais alunos!</p>
                </div>
            </div>
        </section>

        <section class="saber-mais-section flex col">
            <div class="sobre-text">
                <h1>TalentLink - O Caminho para conexões significativas!</h1>
                <p class="hide-mobile">A TalentLink é uma plataforma de recrutamento e seleção que conecta empresas e candidatos de forma rápida e eficiente. Com um sistema de busca avançado, é possível encontrar vagas de emprego em diversas áreas, além de formações e cursos profissionalizantes. Seja você um recrutador em busca do candidato ideal ou um profissional pronto para dar o próximo passo na carreira, a TalentLink é o lugar certo para você!</p>
                <p class="hide-desktop">Encontre vagas, candidatos e cursos de forma rápida e eficiente. Seja para contratar ou crescer na carreira, a TalentLink é o lugar certo para você!</p>
            </div>
            <a href="">Saber mais</a>
        </section>

        <section class="tipos-de-vagas-container">
            <h2>Tipos de vagas</h2>
            <div class="flex row gap-2">
                <div class="type">
                    <img src="./assets/img/tecnologia.png" alt="">
                    <p>Tecnologia</p>
                </div>
                <div class="type">
                    <img src="./assets/img/engenharia.png" alt="">
                    <p>Engenharia</p>
                </div>
                <div class="type">
                    <img src="./assets/img/saude.png" alt="">
                    <p>Saúde</p>
                </div>
                <div class="type">
                    <img src="./assets/img/educacao.png" alt="">
                    <p>Educação</p>
                </div>
            </div>

        </section>
        <section class="">
            
        </section>
        <section class="vagas-localização-section flex col">
            <section class="flex col gap-1">
                <h1 class="home-title">Veja vagas de emprego perto de ti!</h1>
                <p>Pesquise aqui região que deseja verificar vagas de emprego!</p>
                <form action="/vagas/search" class="search-form flex row">
                    <input type="text" name="search" id="location" placeholder="" value="" class="off">
                    <section class="search-select flex row">
                        <i class="fa-solid fa-location-dot"></i>
                        <input type="text" name="location" id="location" placeholder="Na Região...">
                    </section>
                    
                    <button type="submit">Pesquisar</button>
                </form>
            </section>
            <section class="flex col gap-1">
                <h1 class="home-title">Vagas de emprego por províncias</h1>
                <p>Veja vagas de emprego nas 21 províncias de Angola Encontre um emprego que corresponda ao seu pedido.</p>
                <section class="provincias-container">
    
                    <a href="/vagas/search?search=&location=bengo" class="provincia-link">
                        <h1>Bengo</h1>
                        <p>23 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=benguela" class="provincia-link">
                        <h1>Benguela</h1>
                        <p>15 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=bie" class="provincia-link">
                        <h1>Bié</h1>
                        <p>12 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=cabinda" class="provincia-link">
                        <h1>Cabinda</h1>
                        <p>18 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=cuando" class="provincia-link">
                        <h1>Cuando</h1>
                        <p>10 vagas</p>
                    </a>
                    
                    <a href="/vagas/search?search=&location=cubango" class="provincia-link">
                        <h1>Cubango</h1>
                        <p>10 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=cuanza-norte" class="provincia-link">
                        <h1>Cuanza Norte</h1>
                        <p>20 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=cuanza-sul" class="provincia-link">
                        <h1>Cuanza Sul</h1>
                        <p>25 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=cunene" class="provincia-link">
                        <h1>Cunene</h1>
                        <p>14 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=huambo" class="provincia-link">
                        <h1>Huambo</h1>
                        <p>30 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=huila" class="provincia-link">
                        <h1>Huíla</h1>
                        <p>22 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=icole-bengo" class="provincia-link">
                        <h1>Icole-Bengo</h1>
                        <p>8 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=lunda-norte" class="provincia-link">
                        <h1>Lunda Norte</h1>
                        <p>16 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=lunda-sul" class="provincia-link">
                        <h1>Lunda Sul</h1>
                        <p>13 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=luanda" class="provincia-link">
                        <h1>Luanda</h1>
                        <p>50 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=malanje" class="provincia-link">
                        <h1>Malanje</h1>
                        <p>19 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=moxico-oeste" class="provincia-link">
                        <h1>Moxico-Oeste</h1>
                        <p>11 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=moxico-leste" class="provincia-link">
                        <h1>Moxico-Leste</h1>
                        <p>9 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=namibe" class="provincia-link">
                        <h1>Namibe</h1>
                        <p>17 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=uige" class="provincia-link">
                        <h1>Uíge</h1>
                        <p>21 vagas</p>
                    </a>
                
                    <a href="/vagas/search?search=&location=#zaire" class="provincia-link">
                        <h1>Zaire</h1>
                        <p>14 vagas</p>
                    </a>
                </section>
            </section>
        </section>
    </main>
    <footer class="flex col">
        <section class="flex row j-around footer-info-container a-center">
            <img src="./assets/img/logo2.png" alt="" class="footer-logo">
            <section class="flex row j-between footer-info">
                <div class="footer-menu">
                    <h2 class="div-title">Menu</h2>
                    <nav class="flex col">
                        <a href="">Vagas</a>
                        <a href="">Formações</a>
                        <a href="">Sobre</a>
                        <a href="">Meu CV</a>
                    </nav>
                </div>
                <div class="footer-contacts">
                    <h2 class="div-title">Contactos</h2>
                    <div class="flex col">
                        <a href="tel:">+244 935 555 500</a>
                        <a href="">support@TalentLink.ao</a>
                        <p>Talatona, Mix center 65</p>
                    </div>
                </div>
                <div class="footer-social">
                    <h2 class="div-title">Siga- nos</h2>
                </div>
            </section>
        </section>
        <section class="creditos flex f-center">
            <p>Todos os direitos Reservados © 2025 TalentLink | Developed by <a href="https://marimbaz.com">Marimba'z</a></p>
        </section>
    </footer>
    <script src="assets/js/user.js"></script>
</body>