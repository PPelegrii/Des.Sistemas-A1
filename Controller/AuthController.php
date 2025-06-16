<?php

require_once __DIR__ . "/../Model/Usuario.php";

class AuthController {
    static function cadastrar() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $usuario_formulario = $_POST['usuario'] ?? null;
            $senha_formulario = $_POST['senha'] ?? null;
            $data_nascimento = $_POST['data_nascimento'] ?? null;
            $cpf = $_POST['cpf'] ?? null;

            if (is_null($usuario_formulario) || is_null($senha_formulario) || is_null($data_nascimento) || is_null($cpf)) {
                echo "Fazer Cadastro...";
            } else {
                $resp = Usuario::cadastrar($usuario_formulario, $senha_formulario, $data_nascimento, $cpf);

                if ($resp) {
                    echo "Cadastro realizado com sucesso!";
                    header("Location: login");
                } else {
                    echo "Erro ao cadastrar.";
                }
            }
        }
        include __DIR__ . "/../View/cadastrar.php";
    }
    static function login() {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $usuario_formulario = $_POST['usuario'] ?? null;
            $senha_formulario = $_POST['senha'] ?? null;

            if (is_null($usuario_formulario) || is_null($senha_formulario)) {
                echo "Fazer Login...";
            } else {
                $resp = Usuario::fazerLogin($usuario_formulario, $senha_formulario);

                if ($resp) {
                    header("Location: dashboard");
                } else {
                    echo "Erro X.x";
                }
            }
        }
        include __DIR__ . "/../View/login.php";
    }
    static function logout(){
        session_destroy();
        header("Location: login");
    }
    static function recuperarSenha(){
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $usuario_formulario = $_POST['usuario'];

        }
    }
    static function recuperar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $data_nascimento = $_POST['data_nascimento'];
            $cpf = $_POST['cpf'];

            $conn = Banco::getConn();
            $stmt = $conn->prepare("SELECT * FROM usuarios WHERE (usuario=? AND data_nascimento=? AND cpf=?");
            $stmt->execute([$usuario, $usuario, $data_nascimento, $cpf]);
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user) {
                $_SESSION['reset_user_id'] = $user->id;
                header("Location: redefinir");
                exit;
            } else {
                echo "Dados não conferem com o cadastro.";
            }
        }
        include __DIR__ . '/../View/recuperar.php';
    }
    static function redefinir() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['reset_user_id'])) {
            $senha = $_POST['senha'];
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $conn = Banco::getConn();
            $stmt = $conn->prepare("UPDATE usuarios SET senha=? WHERE id=?");
            $stmt->execute([$senhaHash, $_SESSION['reset_user_id']]);
            unset($_SESSION['reset_user_id']);
            echo "Senha redefinida com sucesso!";
        } else {
            include __DIR__ . '/../View/redefinir.php';
        }
    }
}
?>