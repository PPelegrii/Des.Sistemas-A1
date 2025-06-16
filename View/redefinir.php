<form method="post" action="">
    <label>Nova senha:</label>
    <input type="password" name="senha" required><br>
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <input type="submit" value="Redefinir Senha">
</form>