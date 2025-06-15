<?php

require_once __DIR__ . "/../Model/Usuario.php";

class HomeController {

    static function index() {
        AuthController::login();
    }


}
