<!--- app/views/user/register.php---->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/app/css/style.css">
    <title>Registrar</title>
</head>
<body>
    <h1>Registrar</h1>
    <form action="index.php?controller=UserController&action=register" method="post">
        <div class="form-group">
            <label for="username">Nome de usuário:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">Registrar</button>
    </form>
    <p>Já tem uma conta? <a href="index.php?controller=UserController&action=showLoginForm">Entre aqui</a>.</p>
</body>
</html>
