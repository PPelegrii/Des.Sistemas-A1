<?php 
    $pagina = $_GET['p'] ?? null;
    $url = explode('/', $pagina);

    require "Controller/AuthController.php";
    require "Controller/EventoController.php";
    require "Controller/HomeController.php";


    match($url[0]){
        "login" => AuthController::login(),
        "logout" => AuthController::logout(),
        "recuperar" => AuthController::recuperar(),
        "redefinir" => AuthController::redefinir(),
        "cadastrar" => AuthController::cadastrar(),
        
        "dashboard" => HomeController::index(),
        "sobre" => HomeController::sobre(),
        "contato" => HomeController::contato(),

        "eventos" => EventoController::index(),
        "evento_form" => EventoController::criar(),
        "evento/editar" => EventoController::editar($url[2]),
        "evento/apagar" => EventoController::deletar($url[2]),

        default => HomeController::index(),
    }
?>