<?php
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Eventos</title>
    <link rel="stylesheet" href="estilo/index.css">
    <link rel="stylesheet" href="estilo/estilo.css">
    <style>
        .eventos-container {
            max-width: 700px;
            margin: 2rem auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: var(--box-shadow-md);
            padding: 2rem;
        }
        .eventos-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .eventos-list {
            list-style: none;
            padding: 0;
        }
        .evento-item {
            border-bottom: 1px solid var(--color-gray-300);
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .evento-item:last-child {
            border-bottom: none;
        }
        .evento-actions button {
            margin-left: 0.5rem;
        }
        .evento-title {
            font-weight: 500;
            font-size: 1.1rem;
        }
        .evento-datas {
            font-size: 0.95rem;
            color: var(--color-gray-500);
        }
    </style>
</head>
<nav>
    <?php require_once __DIR__ . "/../View/header.php"; ?>
</nav>
<body>
    <div class="eventos-container">
        <div class="eventos-header">
            <h1>Meus Eventos</h1>
            <a href="evento_criar" class="button button--primary">Novo Evento</a>
        </div>
        <?php if (!empty($eventos)): ?>
            <ul class="eventos-list">
                <?php foreach ($eventos as $evento): ?>
                    <li class="evento-item">
                        <div>
                            <div class="evento-title"><?= htmlspecialchars($evento->titulo) ?></div>
                            <div class="evento-datas">
                                <?= date('d/m/Y H:i', strtotime($evento->data_inicio)) ?>
                                &rarr;
                                <?= date('d/m/Y H:i', strtotime($evento->data_fim)) ?>
                            </div>
                            <div><?= htmlspecialchars($evento->descricao) ?></div>
                        </div>
                        <div class="evento-actions">
                            <a href="evento_editar?id=<?= $evento->id ?>" class="button button--secondary button--sm">Editar</a>
                            <a href="evento_deletar?id=<?= $evento->id ?>" class="button button--danger button--sm" onclick="return confirm('Deseja excluir este evento?')">Excluir</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum evento encontrado.</p>
        <?php endif; ?>
        <div style="margin-top:2rem;">
            <a href="dashboard" class="button button--secondary">Voltar ao Dashboard</a>
        </div>
    </div>
</body>
</html>