<nav>
    <h1>Bookshelf Review</h1>
    <?php if (empty($_SESSION['user_id'])): ?>
        <div>
            <a href="index.php?action=books" title="Ir para a página de livros">Livros</a>
            <a href="index.php?action=login" title="Ir para a página de login">Entrar</a>
            <a href="index.php?action=register" title="Ir para a página de registo">Registar</a>
        </div>
    <?php else: ?>
        <div>
            <a href="index.php?action=books" title="Ir para a página de livros">Livros</a>
            <a href="index.php?action=profile" title="Ir para a pagina de perfil"><?php echo $_SESSION['user_name'] ?></a>
            <a href="index.php?action=logout" title="Sair da conta">Sair</a>
        </div>
    <?php endif ?>
</nav>