<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Sobre Nós - Minha Agenda</title>
    <link rel="stylesheet" href="Assets/index.css">
    <link rel="stylesheet" href="Assets/estilo.css">
    <style>
        .sobre-container {
            max-width: 700px;
            margin: 2rem auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: var(--box-shadow-md, 0 2px 8px rgba(0,0,0,0.08));
            padding: 2rem;
        }
        .sobre-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .sobre-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--color-primary, #2563eb);
        }
        .sobre-content {
            font-size: 1.1rem;
            color: var(--color-gray-700, #333);
            line-height: 1.7;
        }
        .integrantes-list {
            margin-top: 2rem;
            padding-left: 1.2rem;
        }
        .integrantes-list li {
            margin-bottom: 0.5rem;
        }
        .voltar-btn {
            display: inline-block;
            margin-top: 2rem;
        }
    </style>
</head>
<nav>
<?php require_once __DIR__ . "/../View/header.php"; ?>
</nav>
<body>
    <div class="sobre-container">
        <div class="sobre-header">
            <h1>Sobre Nós</h1>
        </div>
        <div class="sobre-content">
            <p>
                O <strong>Minha Agenda</strong> é um sistema desenvolvido para facilitar a organização de compromissos, tarefas e eventos do dia a dia. Nosso objetivo é proporcionar uma experiência simples, intuitiva e segura para que você possa gerenciar sua rotina de forma eficiente.
            </p>
            <p>
                O projeto foi criado como parte da disciplina de Desenvolvimento de Sistemas (A1), utilizando PHP, PDO, MySQL, HTML, CSS e o padrão MVC. Implementamos recursos como cadastro e autenticação de usuários, recuperação de senha, CRUD de eventos e uma interface moderna e responsiva.
            </p>
            <h2>Integrantes do Grupo</h2>
            <ul class="integrantes-list">
                <li>Pedro Henrique Pelegri dos Santos - <a href="https://github.com/PPelegrii" target="_blank">PPelegrii</a></li>
                <li>Maria Beatriz Fossa Guedes - <a href="https://github.com/BiaGuedes2005" target="_blank">BiaGuedes2005</a></li>
                <li>Kauã Felipe Rodrigues da Luz - <a href="https://github.com/kauafelipe0172" target="_blank">kauafelipe0172</a></li>
            </ul>
            <a href="login" class="button button--secondary voltar-btn">Voltar ao login</a>
        </div>
    </div>
</body>
</html>