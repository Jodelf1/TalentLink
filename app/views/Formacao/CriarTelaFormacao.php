<?php $this->layout('layouts/base', ['title' => 'Criar Formação']) ?>

<h1>Criar Nova Formação</h1>

<form action="/formacao/criar" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" required></textarea><br>

    <label for="data_inicio">Data de Início:</label>
    <input type="datetime-local" id="data_inicio" name="data_inicio" required><br>

    <label for="data_fim">Data de Fim:</label>
    <input type="datetime-local" id="data_fim" name="data_fim" required><br>

    <label for="localizacao">Localização:</label>
    <input type="text" id="localizacao" name="localizacao" required><br>

    <label for="link">Link (opcional):</label>
    <input type="url" id="link" name="link"><br>

    <button type="submit">Criar Formação</button>
</form>
