<?php

require_once __DIR__ . '/../Model/Evento.php';

class EventoController
{
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

    public static function editar()
{
    session_start();
    if (!isset($_SESSION['id-usuario'])) {
        header('Location: login');
        exit;
    }

    // Capturar o ID do evento via GET
    $Id = $_GET['id'] ?? null;

    if (!$Id) {
        echo "ID do evento não fornecido.";
        exit;
    }

    // Buscar o evento pelo ID
    $evento = Evento::buscarPorId($Id);
    if (!$evento) {
        echo "Evento não encontrado.";
        exit;
    }

        // Verificar se os dados foram enviados via GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $titulo = $_GET['titulo'] ?? null;
            $descricao = $_GET['descricao'] ?? null;
            $data_inicio = $_GET['data_inicio'] ?? null;
            $data_fim = $_GET['data_fim'] ?? null;

            // Atualizar o evento
            if (Evento::editar($Id, $titulo, $descricao, $data_inicio, $data_fim)) {
                header('Location: eventos');
                exit;
            } else {
                $erro = "Erro ao atualizar evento.";
            }
        }

        // Incluir o formulário de edição
        include __DIR__ . '/../View/evento_form.php';
    }

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