<?php

namespace app\Controllers;
use app\Controllers\authController;

class homeController
{

    public function __construct()
    {
        $this->auth = new authController(); 
    }

    public function index()
    {
       
        controller::view('index');        
    }

    public function about()
    {
        //Função para visualizar a página sobre
        //controller::view('about');
    }

    public function contact()
    {
        //Função para visualizar a página de contato
        //controller::view('contact');
    }
    
    public function config()
    {
        //Função para visualizar a página de configurações
        controller::view('config');
    }
}