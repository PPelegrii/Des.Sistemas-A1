<form method="post" action="">
    Usuario: <input type="text" name="usuario" required><br>
    Data Nascimento: <input type="date" name="data_nascimento" required><br>
    CPF: <input type="text" name="cpf" required><br>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="submit" value="Recuperar Senha">
</form>