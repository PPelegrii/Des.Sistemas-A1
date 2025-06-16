<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($evento) ? 'Editar Evento' : 'Novo Evento' ?></title>
    <link rel="stylesheet" href="estilo/index.css">
    <link rel="stylesheet" href="estilo/estilo.css">
    <style>
        .evento-form-container {
            max-width: 500px;
            margin: 2rem auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: var(--box-shadow-md, 0 2px 8px rgba(0,0,0,0.08));
            padding: 2rem;
        }
        .evento-form-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .evento-form label {
            display: block;
            margin-top: 1rem;
            margin-bottom: 0.3rem;
            font-weight: 500;
        }
        .evento-form input, .evento-form textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid var(--color-gray-300, #ccc);
            border-radius: 4px;
            font-size: 1rem;
        }
        .evento-form textarea {
            resize: vertical;
            min-height: 60px;
        }
        .evento-form .form-actions {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <div class="evento-form-container">
        <h1><?= isset($evento) ? 'Editar Evento' : 'Novo Evento' ?></h1>
        <?php if (isset($erro)): ?>
            <div style="color: red; margin-bottom: 1rem;"><?= htmlspecialchars($erro) ?></div>
        <?php endif; ?>
        <form class="evento-form" method="post" action="">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" required value="<?= isset($evento) ? htmlspecialchars($evento->titulo) : '' ?>">

            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao"><?= isset($evento) ? htmlspecialchars($evento->descricao) : '' ?></textarea>

            <label for="data_inicio">Data e Hora de Início</label>
            <input type="datetime-local" id="data_inicio" name="data_inicio" required
                value="<?= isset($evento) ? date('Y-m-d\TH:i', strtotime($evento->data_inicio)) : '' ?>">

            <label for="data_fim">Data e Hora de Fim</label>
            <input type="datetime-local" id="data_fim" name="data_fim" required
                value="<?= isset($evento) ? date('Y-m-d\TH:i', strtotime($evento->data_fim)) : '' ?>">
            <div class="form-actions">
                <button type="submit" class="button button--primary"><?= isset($evento) ? 'Salvar Alterações' : 'Criar Evento' ?></button>
                <a href="eventos" class="button button--secondary">Cancelar</a>
                <?php 
                ?>
            </div>
        </form>
    </div>