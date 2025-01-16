<?php

namespace app\Controllers;
use app\Controllers\authController;
use app\Controllers\vagaController;

class userController
{
    public function __construct()
    {
        $this->auth = new authController(); 
        $this->vaga = new vagaController();
    }

    public function index(){
        $this->auth->checkAuthentication();
        $this->auth->protect("candidato");
        $vagas = $this->vaga->listVagas();

        controller::view("user/index", ['vagas' => array_reverse($vagas)]);
    }

}