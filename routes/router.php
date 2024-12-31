<?php 

function load($controller, $action){

    try{
        
        $controllerNamespace = "app\\controllers\\{$controller}";
        
        // Verifica se a classe existe
        if(!class_exists($controllerNamespace)){
            throw new Exception("O Controller {$controller} não foi encontrado!"); 
        }
        // Instancia o controller
        $controllerInstance  = new $controllerNamespace();

        // Verifica se o método existe
        if(!method_exists($controllerInstance, $action)){
            throw new Exception("A action {$action} não foi encontrada no controller {$controller}"); 
        }

        // Executa o método
        $controllerInstance->$action();

    }catch(Exception $e){
        echo $e->getMessage();
    }
}


$router = [
    'GET' => [
        /* Rota Geral */

        "/" => fn() => load("homeController", "index"),
        "/sobre" => fn() => load("homeController", "about"),
        "/contato" => fn() => load("homeController", "contact"),
        "/vagas" => fn() => load("vagaController", "index"),
        "/vagas/tag={categoria}" => fn($categoria) => load("vagaController", "listVagasByCategory", $categoria),
        "/vagas/{slug}" => fn($slug) => load("vagaController", "viewVagaDetails", $slug),
        

        /* Autenticação */
        "/register" => fn() => load("AuthController", "register"),
        "/login" => fn() => load("AuthController", "loginForm"),
        "/logout" => fn() => load("AuthController", "logout"),

        /* Rota das empresas */

        "/empresas" => fn() => load("empresaController", "index"),
        "/empresas/vagas" => fn() => load("vagaController", "listVagas"),
        "/empresas/create/vaga" => fn() => load("vagaController", "create"),
        "/empresas/edit/vaga" => fn() => load("vagaController", "edit"),
        "/empresas/delete/vaga" => fn() => load("vagaController", "delete"),
        "/empresas/candidaturas/{slug}" => fn($slug) => load("vagaController", "listVagaApplications", $slug),
       
        /* Rotas dos Candidatos */

        "/cv" => fn() => load("cvController", "index"),
        "/candidaturas" => fn() => load("vagaController", "listVagaApplicationsByCandidate"),
        "/cv/create" => fn() => load("cvController", "createCV"),
        "/cv/edit" => fn() => load("cvController", "editCV"),
        "/cv/share/{id_hash}" => fn($id_hash) => load("cvController", "viewCV", $id_hash),
        "/cv/download" => fn() => load("cvController", "downloadCV"),
        "/candidaturas/{slug}" => fn($slug) => load("vagaController", "viewApplicationDetails", $slug),

        /* Rotas de Administradores */

        "/admin" => fn() => load("adminController", "index"),
        "/admin/empresas" => fn() => load("empresaController", "listEmpresas"),
        "/admin/empresas/{slug}" => fn($slug) => load("empresaController", "viewEmpresaDetails", $slug),
        "/admin/candidatos" => fn() => load("candidatoController", "listCandidatos"),
        "/admin/candidatos/{slug}" => fn($slug) => load("candidatoController", "viewCandidatoDetails", $slug),
        "/admin/vagas" => fn() => load("vagaController", "listVagas"),
        "/admin/create/admin" => fn() => load("adminController", "createAdmin"),

        /* Rotas dos Formadores */

        "/formador" => fn() => load("formadorController", "index"),
        "/formador/cursos" => fn() => load("formacaoController", "index"),
        "/formador/cursos/{slug}" => fn($slug) => load("formacaoController", "viewCursoDetails", $slug),



    ],

    'POST' => [

        "/login" => fn() => load("AuthController", "login"),
        "/register" => fn() => load("AuthController", "store"),


        /* Rota das empresas */
        "/empresas/create/vaga" => fn() => load("vagaController", "create"),
        "/empresas/edit/vaga" => fn() => load("vagaController", "edit"),
        "/empresas/delete/vaga" => fn() => load("vagaController", "delete"),
        
        /* Rotas dos Candidatos */
        "/cv/create" => fn() => load("cvController", "createCV"),
        "/cv/edit" => fn() => load("cvController", "editCV"),
        "/cv/delete" => fn() => load("cvController", "deleteCV"),
        "/vagas/apply" => fn() => load("vagaController", "applyToVaga"),
        "/vagas/cancel" => fn() => load("vagaController", "cancelVagaApplication"),

        /* Rotas de Administradores */

        "/admin/create/admin" => fn() => load("adminController", "createAdmin"),

        /* Rotas dos Formadores */

        "/formador/create/formacao" => fn() => load("formacaoController", "createFormacao"),
        "/formador/edit/formacao" => fn() => load("formacaoController", "editFormacao"),
        "/formador/delete/formacao" => fn() => load("formacaoController", "deleteFormacao"),


    ]
];
