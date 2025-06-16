<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="Assets/index.css">
    <link rel="stylesheet" href="Assets/estilo.css">
</head>
<nav>
    <?php require_once __DIR__ . "/../View/header.php";?>
</nav>
<body>
    <div class="app">
        <div class="sidebar desktop-only">
            <div class="sidebar__logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-mail">
                    <path d="M4 4h16v16H4z" />
                    <path d="M22 4l-10 7L2 4" />
                </svg>
                <span class="sidebar__title">Contato</span>
            </div>
        </div>
        <main class="main">
            <div class="contact-form">
                <h1>Entre em Contato</h1>
                <form method="POST" action="processar_contato.php">
                    <div class="form__field">
                        <label class="form__label" for="nome">Nome</label>
                        <input class="input input--fill" id="nome" name="nome" type="text" placeholder="Seu nome" required />
                    </div>
                    <div class="form__field">
                        <label class="form__label" for="email">Email</label>
                        <input class="input input--fill" id="email" name="email" type="email" placeholder="Seu email" required />
                    </div>
                    <div class="form__field">
                        <label class="form__label" for="mensagem">Mensagem</label>
                        <textarea class="input input--fill" id="mensagem" name="mensagem" placeholder="Sua mensagem" required></textarea>
                    </div>
                    <button class="button button--primary" type="submit">Enviar</button>
                </form>
            </div>
        </main>
    </div>
    <script src="assets/scripts/index.js" type="module"></script>
</body>
</html>