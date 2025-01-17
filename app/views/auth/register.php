<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talent Link | Criar Conta</title>
</head>
<body>

    <h1>Criar Conta</h1>
    <form action="/register" method="post">
        <?=  isset($msg) ? $msg : '' ?>
        <br>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Senha">
        <input type="password" name="password_confirm" placeholder="Confirme a Senha">
        <select name="user_type" id="">
            <option value="candidato">Candidato</option>
            <option value="empresa">Empresa</option>
            <option value="formador">Formador</option>
        </select>
        <button type="submit">Criar Conta</button>
    </form>
    <a href="/login">Já tem uma conta? Faça login</a>
    
</body>
</html>