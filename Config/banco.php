<?php

class Banco {
    private static $conn;

    public static function getConn(){
        if (!self::$conn) {
            $host = 'localhost';
            $dbname = 'php-a1';
            $user = 'root';
            $senh = '';
            $tipoBanco = "mysql:host=$host;dbname=$dbname;charset=utf8";

            try {
                self::$conn = new PDO($tipoBanco, $user, $senh);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro de conexão: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
?>