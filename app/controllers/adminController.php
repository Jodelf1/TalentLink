<?php 
namespace app\controllers;

class adminController{ 
    public function index()
    {
        controller::view('admin/index');
    }

    public function createAdmin($data)
    {
        //Função para criar um novo admin
    }

    public function deleteAdmin($admin_id)
    {
        //Função para deletar um admin
    }

}