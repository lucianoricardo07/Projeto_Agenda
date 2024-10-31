
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <?php if (isset($_SESSION['usuario_nome'])): ?>
            <div class="d-flex w-100 justify-content-between">
                <span class="navbar-text ">
                    <p class='usuario-nome'> Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?></p>
                </span>
                <a class="sair btn" href="logout.php">Sair</a>
            </div>
        <?php endif; ?>
    </div>kj
</nav>
