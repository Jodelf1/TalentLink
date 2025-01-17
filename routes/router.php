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
        "/vagas" => fn() => load("vagaController", "index"),
        "/vagas/tag={categoria}" => fn($categoria) => load("vagaController", "listVagasByCategory", $categoria),
        "/vagas/{slug}" => fn($slug) => load("vagaController", "viewVagaDetails", $slug),
        "/formacoes" => fn() => load("formacaoController", "index"),
        "/formacoes/{slug}" => fn($slug) => load("formacaoController", "viewCursoDetails", $slug),
        "/config" => fn() => load("homeController", "config"),
        "/empresa/{empresaId}" => fn($params) => load("empresaController", "exibirDetalhes", $params),

        /* Autenticação */
        "/register" => fn() => load("AuthController", "register"),
        "/login" => fn() => load("AuthController", "loginForm"),
        "/logout" => fn() => load("AuthController", "logout"),

        /* Rota das empresas */
        "/empresas/perfil" => fn() => load("empresaController", "mostrarPerfil"),
        "/empresas" => fn() => load("empresaController", "index"),
        "/empresas/create/profile" => fn() => load("empresaController", "criarPerfil"),
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
        "/formador" => fn() => load("formacaoController", "index"), 
        "/formador/detalhes" => fn() => load("formacaoController", "detalhesFormacao"), 
        "/formador/cursos" => fn() => load("formacaoController", "index"),
        "/formador/cursos/{slug}" => fn($slug) => load("formacaoController", "viewCursoDetails", $slug),

        /* Rotas de candidaturas */
        "/candidaturas" => fn() => load("CandidaturaController", "listByCandidato"),


    ],

    'POST' => [

        "/login" => fn() => load("AuthController", "login"),
        "/register" => fn() => load("AuthController", "store"),


        /* Rota das empresas */
        
        "/empresas/create" => fn() => load("empresaController", "criarPerfil"),
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
                           
        "/formador/create" => fn() => load("formacaoController", "createFormadores"),
        "/formador/edit/formacao" => fn() => load("formacaoController", "editFormacao"),
        "/formador/delete/formacao" => fn() => load("formacaoController", "deleteFormacao"),
       
         /* Rotas das candidaturas */
        "/candidaturas/create" => fn() => load("CandidaturaController", "create"),
        "/candidaturas/update/{id}" => fn($params) => load("CandidaturaController", "updateStatus", $params),
        "/candidaturas/delete/{id}" => fn($params) => load("CandidaturaController", "delete", $params),

        


    ]
];
