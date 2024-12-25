<?php 

namespace app\controllers;

class cvController
{
    public function index()
    {
        controller::view('index');
    }

    public function createCv($data)
    {
        //Função para criar o CV
    }

    public function viewCV($cv_id)
    {
        //Função para visualizar um CV
    }

    public function downloadCV($cv_id)
    {
        //Função para fazer download de um CV
    }

    public function editCV($cv_id, $data)
    {
        //Função para editar um CV
    }

}
