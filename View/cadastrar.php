<nav>
    <?php require_once __DIR__ . "/../View/header.php"; ?>
</nav>
<form method="post" action="">
    Usuario: <input type="text" name="usuario" required>
    Senha: <input type="password" name="senha" required>
    Data Nascimento: <input type="date" name="data_nascimento" required>
    CPF: <input type="text" name="cpf" required>
    <input type="submit" value="Cadastrar">
</form>
<a href="login">Voltar ao login</a>
