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
        "/" => fn() => load("homeController", "index"),
        "/vagas" => fn() => load("vagaController", "index"),
        "/meucv" => fn() => load("cvController", "index")

    ],

    'POST' => [
        "/login" => fn() => load("AuthController", "login")
    ]
];
