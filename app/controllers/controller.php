<?php

namespace app\controllers;
use League\Plates\Engine;

class controller{

    public static function view(string $view, array $data = []){
        $viewsPath = dirname(__DIR__).'/views';
        
        // Verifica se a view existe
        if(!file_exists($viewsPath.'/'.$view.'.php')){
            throw new \Exception("View {$view} não encontrada");
        }

        $templates = new Engine($viewsPath);
        echo $templates->render($view, $data);
    }
}