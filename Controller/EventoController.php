<?php

require_once __DIR__ . '/../Model/Evento.php';

class EventoController
{
    // Listar eventos do usuário logado
    public static function index(){
        session_start();
        if (!isset($_SESSION['id-usuario'])) {
            header('Location: login');
            exit;
        }
        $usuario_id = $_SESSION['id-usuario'];
        $eventos = Evento::listarPorUsuario($usuario_id);
        include __DIR__ . '/../View/eventos.php';
    }

    // Exibir formulário de criação
    public static function criar(){
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario_id = $_SESSION['id-usuario'];
            $titulo = $_POST['titulo'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $data_inicio = $_POST['data_inicio'] ?? null;
            $data_fim = $_POST['data_fim'] ?? null;

            if (Evento::criar($titulo, $descricao, $data_inicio, $data_fim, $usuario_id)) {
                header('Location: eventos');
                exit;
            } else {
                $erro = "Erro ao criar evento.";
            }
        }
        include __DIR__ . '/../View/evento_form.php';
    }

    // Exibir formulário de edição
    public static function editar($Id)
    {
        session_start();
        if (!isset($_SESSION['id-usuario'])) {
            header('Location: login');
            exit;
        }
        $evento = Evento::buscarPorId($Id);
        if (!$evento) {
            echo "Evento não encontrado.";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? null;
            $descricao = $_POST['descricao'] ?? null;
            $data_inicio = $_POST['data_inicio'] ?? null;
            $data_fim = $_POST['data_fim'] ?? null;

            if (Evento::atualizar($Id, $titulo, $descricao, $data_inicio, $data_fim)) {
                header('Location: eventos');
                exit;
            } else {
                $erro = "Erro ao atualizar evento.";
            }
        }
        include __DIR__ . '/../View/evento_form.php';
    }

    // Deletar evento
    public static function deletar($Id){
        if (Evento::deletar($Id)) {
            header('Location: eventos');
            exit;
        } else {
            echo "Erro ao deletar evento.";
        }
    }
}
?>