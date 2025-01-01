<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['error']) && $_SESSION['error'] > 0): ?>
        <p>Email ou senha inválidos</p>
    <?php endif; ?>
    <h1>Login</h1>
    <form action="/login" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Senha">
        <button type="submit">Login</button>
    </form>
</body>
</html>