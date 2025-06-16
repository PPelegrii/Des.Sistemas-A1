<?php

require_once __DIR__ . "/../Config/Banco.php";

class Usuario {

    public static function cadastrar($usuario, $senha, $data_nascimento, $cpf) {
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    $conn = Banco::getConn();
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha, data_nascimento, cpf) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$usuario, $senhaHash, $data_nascimento, $cpf]);
    }

    public static function fazerLogin($usuario, $senha) {
    $conn = Banco::getConn();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_OBJ);

    if ($user && password_verify($senha, $user->senha)) {
        $_SESSION['usuario'] = $user->usuario;
        $_SESSION['id-usuario'] = $user->Id;
        return true;
    }
    return false;
    }
}
?>
