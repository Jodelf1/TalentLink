<?php

namespace app\Controllers;

class homeController
{
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
    
}