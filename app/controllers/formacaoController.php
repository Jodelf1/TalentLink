<?php

namespace app\controllers;

class formacaoController
{
    public function index()
    {
        controller::view('formacao');
    }

    public function createFormacao($data)
    {
        //Função para criar uma nova formação
    }

    public function editFormacao($formacao_id, $data)
    {
        //Função para editar uma formação
    }

    public function deleteFormacao($formacao_id)
    {
        //Função para deletar uma formação
    }

    public function listFormacoes()
    {
        //Função para listar todas as formações
    }

    public function listFormacoesByFormador($formador_id)
    {
        //Função para listar todas as formações de um formador
    }

    public function searchFormacoes($search)
    {
        //Função para pesquisar formações
    }
}