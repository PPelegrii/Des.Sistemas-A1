<nav>
    <?php require_once __DIR__ . "/../View/header.php"; ?>
</nav>

<form method="post" action="">
    Usuario: <input type="text" name="usuario">
    Senha: <input type="password" name="senha">
    <input type="submit" value="Login">
</form>
<a href="recuperar">Recuperar Senha</a>