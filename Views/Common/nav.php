<nav>
    <a href="index.php?action=books" title="Ir para a página de livros">Livros</a>
    <?php if (empty($_SESSION['user_id'])): ?>
        <a href="index.php?action=login" title="Ir para a página de login">Entrar</a>
        <a href="index.php?action=register" title="Ir para a página de registo">Registar</a>
    <?php else: ?>
        <a href="index.php?action=profile" title="Ir para a pagina de perfil"><?= htmlspecialchars($_SESSION["user_name"]) ?></a>
        <a href="index.php?action=logout">Sair</a>
    <?php endif ?>
</nav>