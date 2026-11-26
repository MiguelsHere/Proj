<nav>
    <h1><a href="index.php">Bookshelf Review</a></h1>
    <div id="sitenav">
        <a href="" title="Ir para pagina de utilizadores">Utilizadores</a>
        <a href="index.php?action=books" title="Ir para a página de livros">Livros</a>
        <a href="" title="I para a sua Shelf">Shelf</a>
    </div>
    <div id="usernav">
        <?php if (empty($_SESSION['user_id'])): ?>
            <a href="index.php?action=login" title="Ir para a página de login">Entrar</a>
            <a href="index.php?action=register" title="Ir para a página de registo">Registar</a>
        <?php else: ?>
            <a href="index.php?action=profile" title="Ir para a pagina de perfil"><?php echo $_SESSION['user_name'] ?></a>
            <a href="index.php?action=logout" title="Sair da conta">Sair</a>
        <?php endif ?>
    </div>
</nav>