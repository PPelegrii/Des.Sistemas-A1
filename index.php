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
        "redefinir" => AuthController::redifinir(),
        "cadastrar" => AuthController::cadastrar(),
        "dashboard" => TarefasController::index(),

        /*"add" => TarefasController::addTarefa(),
        "editar" => TarefasController::editarTarefa($url[1]),
        "atualizar" => TarefasController::atualizarTarefa(),
        "apagar" => TarefasController::apagarTarefa($url[1]),*/
        default => HomeController::index(),
    }
?>