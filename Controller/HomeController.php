<?php

require_once __DIR__ . "/../Model/Usuario.php";

class HomeController {

    static function index() {
        session_start();
        if(!isset($_SESSION['usuario'])) {
            AuthController::login();
            exit();
        }
        include __DIR__ . "/../View/dashboard.php";
    }

    static function sobre() {
        session_start();
        include __DIR__ . "/../View/sobre.php";
    }

    static function contato() {
        session_start();
        include __DIR__ . "/../View/contato.php";
    }

}
