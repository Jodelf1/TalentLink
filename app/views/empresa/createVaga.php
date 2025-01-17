<?php $this->layout('layouts/empresa', ['title' => 'Criar Vaga | TalentLink']) ?>

<section class="container">
    <h1 class="section-title">Publicar Vaga</h1>
    <form action="/c/create/vaga" method="POST" class="create-form flex row" enctype="multipart/form-data">
        <section class="flex col">
            <section class="add_image" id="imagem">
                <img src="/assets/img/profile-example.jpg" alt="" id="foto">
                <input type="file" id="foto_capa" class="off" name="foto_capa" accept="image/*">
            </section>
            <section class="information-log" id="log-container">
                        
            </section>
        </section>
        <section>
            <div class="form-group">
                <label for="titulo">Título da Vaga</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição da Vaga</label>
                <textarea id="descricao" name="descricao" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" >
                    <option value="" disabled selected>Selecione uma categoria</option>
                    <option value="tecnologia">Tecnologia</option>
                    <option value="saude">Saúde</option>
                    <option value="educacao">Educação</option>
                    <option value="financeiro">Financeiro</option>
                        <!-- Adicione mais categorias conforme necessário -->
                </select>
            </div>
            <div class="form-group">
                <label for="localizacao">Localização</label>
                <input type="text" id="localizacao" name="localizacao" required>
            </div>
            <div class="form-group">
                <label for="salario_minimo">Salário Mínimo (opcional)</label>
                <input type="number" id="salario_minimo" name="salario_minimo" step="0.01">
            </div>
            <div class="form-group">
                <label for="salario_maximo">Salário Máximo (opcional)</label>
                <input type="number" id="salario_maximo" name="salario_maximo" step="0.01">
            </div>
            <div class="form-group">
                <label for="data_expiracao">Data de Expiração</label>
                <input type="date" id="data_expiracao" name="data_expiracao" required>
            </div>
            <button type="submit" class="btn">Publicar Vaga</button>
        </section>
        
    </form>
</section>
<script src="/assets/js/foto.js"></script>
<script src="/assets/js/log.js"></script>
<script src="/assets/js/registroVaga.js"></script>