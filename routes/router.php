<?php 

class RouteNotFoundException extends Exception {}


function route($metodo, $path, $router)
{
    // Verifica se o método existe no roteador
    if (!isset($router[$metodo])) {
        throw new RouteNotFoundException("Método HTTP não encontrado.");
    }

    // Itera sobre as rotas registradas
    foreach ($router[$metodo] as $route => $callback) {
        // Substitui os placeholders no padrão da rota
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<\1>[^/]+)', $route);
        $pattern = '@^' . $pattern . '$@';

        // Verifica se o caminho atual corresponde ao padrão da rota
        if (preg_match($pattern, $path, $matches)) {
            $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
            return $callback($params);
        }
    }

    // Lança exceção se nenhuma rota for encontrada
    throw new RouteNotFoundException("Rota não encontrada: $path");
}


function load($controller, $action, $params = []){

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
        $controllerInstance->$action($params);

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
        "/formacoes" => fn() => load("formacaoController", "index"),
        "/formacoes/{slug}" => fn($slug) => load("formacaoController", "viewCursoDetails", $slug),
        "/config" => fn() => load("homeController", "config"),
        "/empresa/{empresaId}" => fn($params) => load("empresaController", "exibirDetalhes", $params),
        "/test" => fn() => load("authController", "testActive"),

        "/cv" => fn() => load("cvController", "index"),
        "/candidaturas" => fn() => load("vagaController", "listVagaApplicationsByCandidate"),
        "/cv/create" => fn() => load("cvController", "createCV"),
        "/cv/edit" => fn() => load("cvController", "editCV"),
        "/cv/share/{id_hash}" => fn($id_hash) => load("cvController", "viewCV", $id_hash),
        "/cv/download" => fn() => load("cvController", "downloadCV"),
        "/candidaturas" => fn() => load("vagaController", "viewApplications"),
        "/candidaturas/{id}" => fn($params) => load("vagaController", "viewApplicationDetails", $params),

        "/vagas" => fn() => load("vagaController", "index"),
        "/vagas/tag={categoria}" => fn($categoria) => load("vagaController", "listVagasByCategory", $categoria),
        "/vaga/{id}" => fn($params) => load("vagaController", "viewVagaDetails", $params),

        /* Autenticação */
        "/register" => fn() => load("AuthController", "register"),
        "/login" => fn() => load("AuthController", "loginForm"),
        "/logout" => fn() => load("AuthController", "logout"),

        /* Rota das empresas */
        "/c/perfil" => fn() => load("empresaController", "mostrarPerfil"),
        "/c" => fn() => load("empresaController", "index"),
        "/c/create/profile" => fn() => load("empresaController", "criarPerfil"),
        "/c/vagas" => fn() => load("vagaController", "listVagasByCompany"),
        "/c/create/vaga" => fn() => load("vagaController", "create"),
        "/c/edit/vaga" => fn() => load("vagaController", "edit"),
        "/c/delete/vaga" => fn() => load("vagaController", "delete"),
        "/c/candidaturas/{slug}" => fn($slug) => load("vagaController", "listVagaApplications", $slug),
       
        /* Rotas dos Candidatos */
       

        /* Rotas de Administradores */

        "/admin" => fn() => load("adminController", "index"),
        "/admin/empresas" => fn() => load("empresaController", "listEmpresas"),
        "/admin/empresas/{slug}" => fn($slug) => load("empresaController", "viewEmpresaDetails", $slug),
        "/admin/candidatos" => fn() => load("candidatoController", "listCandidatos"),
        "/admin/candidatos/{slug}" => fn($slug) => load("candidatoController", "viewCandidatoDetails", $slug),
        "/admin/vagas" => fn() => load("vagaController", "listVagas"),
        "/admin/create/admin" => fn() => load("adminController", "createAdmin"),

        /* Rotas dos Formadores */
        "/formador" => fn() => load("formacaoController", "index"), 
        "/formador/detalhes" => fn() => load("formacaoController", "detalhesFormacao"), 
        "/formador/cursos" => fn() => load("formacaoController", "index"),
        "/formador/cursos/{slug}" => fn($slug) => load("formacaoController", "viewCursoDetails", $slug),



    ],

    'POST' => [

        "/login" => fn() => load("AuthController", "login"),
        "/register" => fn() => load("AuthController", "store"),


        /* Rota das empresas */
        
        "/c/create" => fn() => load("empresaController", "criarPerfil"),
        "/c/create/vaga" => fn() => load("vagaController", "create"),
        "/c/edit/vaga" => fn() => load("vagaController", "edit"),
        "/c/delete/vaga" => fn() => load("vagaController", "delete"),
        
        /* Rotas dos Candidatos */
        "/cv/create" => fn() => load("cvController", "createCV"),
        "/cv/edit" => fn() => load("cvController", "editCV"),
        "/cv/delete" => fn() => load("cvController", "deleteCV"),
        "/vagas/apply" => fn() => load("vagaController", "applyToVaga"),
        "/vagas/cancel" => fn() => load("vagaController", "cancelVagaApplication"),

        /* Rotas de Administradores */

        "/admin/create/admin" => fn() => load("adminController", "createAdmin"),

        /* Rotas dos Formadores */
                           
        "/formador/create" => fn() => load("formacaoController", "createFormadores"),
        "/formador/edit/formacao" => fn() => load("formacaoController", "editFormacao"),
        "/formador/delete/formacao" => fn() => load("formacaoController", "deleteFormacao"),
       


    ]
];
