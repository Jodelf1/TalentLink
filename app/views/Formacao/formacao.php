<h1>Criar Perfil de Formador</h1>
<form action="/formador/create" method="POST">
    <label for="nome_formador">Nome:</label>
    <input type="text" id="nome_formador" name="nome_formador" required><br>

    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio" required></textarea><br>

    <label for="especialidades">Especialidades:</label>
    <textarea id="especialidades" name="especialidades" required></textarea><br>

    <label for="localizacao">Localização:</label>
    <input type="text" id="localizacao" name="localizacao" required><br>

    <label for="contato">Contato:</label>
    <input type="text" id="contato" name="contato" required><br>

    <button type="submit">Criar Perfil</button>
</form>

