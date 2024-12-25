<?php
require '../vendor/autoload.php';
require '../routes/router.php';

use Dotenv\Dotenv;

$path = dirname(__FILE__, 2);
$dotenv = Dotenv::createImmutable($path);
$dotenv->load();

try{
    // Obtendo a URI e o metodo da requisição
    $uri = parse_url($_SERVER['REQUEST_URI'])["path"];
    $request = $_SERVER['REQUEST_METHOD'];
    
    // Verifica se a rota existe
    if(!isset($router[$request])){
        throw new Exception("A Rota não existe!");
    }
    if(!array_key_exists($uri, $router[$request])){
        throw new Exception("A Rota não existe!");
    }

    // Executa a rota
    $controller = $router[$request][$uri];
    $controller();
}catch(Exception $e){
    echo $e->getMessage();
}