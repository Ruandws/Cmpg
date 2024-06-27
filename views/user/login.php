<!-- app/views/user/login.php -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/app/css/style.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="index.php?controller=UserController&action=login" method="post">
        <div class="form-group">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem uma conta? <a href="index.php?controller=UserController&action=showRegisterForm">Registre-se aqui</a>.</p>
</body>
</html>
