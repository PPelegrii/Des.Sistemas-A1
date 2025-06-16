<nav class="main-nav" style="background:#f5f5f5;padding:1rem 0 1rem 0;margin-bottom:2rem;">
    <div style="max-width:700px;margin:0 auto;display:flex;gap:1rem;align-items:center;">
        <?php if (isset($_SESSION['id-usuario'])): ?>
            <a href="dashboard" class="button button--secondary">Dashboard</a>
            <a href="eventos" class="button button--secondary">Eventos</a>
            <a href="sobre" class="button button--secondary">Sobre Nós</a>
            <a href="contato" class="button button--secondary">Contato</a>
            <a href="logout" class="button button--danger">Logout</a>
        <?php else: ?>
            <a href="login" class="button button--secondary">Fazer Login</a>
            <a href="cadastrar" class="button button--primary">Cadastrar</a>
            <a href="sobre" class="button button--secondary">Sobre Nós</a>
            <a href="contato" class="button button--secondary">Contato</a>
        <?php endif; ?>
    </div>
</nav>