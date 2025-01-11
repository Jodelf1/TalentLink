<?php

namespace app\Controllers;
use app\Controllers\authController;

class userController
{
    public function __construct()
    {
        $this->auth = new authController(); 
    }

    public function index(){
        $this->auth->checkAuthentication();
        $this->auth->protect("candidato");
        controller::view("user/index");
    }

}