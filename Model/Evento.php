<?php

require_once __DIR__ . "/../Config/Banco.php";

class Evento {

    public static function listarPorUsuario($usuario_id) {
        $conn = Banco::getConn();
        $stmt = $conn->prepare("SELECT * FROM eventos WHERE usuario_id = ?");
        $stmt->execute([$usuario_id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function criar($titulo, $descricao, $data_inicio, $data_fim, $usuario_id) {
        $conn = Banco::getConn();
        $stmt = $conn->prepare("INSERT INTO eventos (titulo, descricao, data_inicio, data_fim, usuario_id) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$titulo, $descricao, $data_inicio, $data_fim, $usuario_id]);
    }

    public static function buscarPorId($id) {
        $conn = Banco::getConn();
        $stmt = $conn->prepare("SELECT * FROM eventos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public static function editar($id, $titulo, $descricao, $data_inicio, $data_fim) {
        $conn = Banco::getConn();
        $stmt = $conn->prepare("UPDATE eventos SET titulo = ?, descricao = ?, data_inicio = ?, data_fim = ? WHERE id = ?");
        return $stmt->execute([$titulo, $descricao, $data_inicio, $data_fim, $id]);
    }

    public static function deletar($id) {
        $conn = Banco::getConn();
        $stmt = $conn->prepare("DELETE FROM eventos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
