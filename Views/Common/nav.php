<nav>
    <?php if (empty($_SESSION['user_id'])): ?>
        <a href="index.php?action=login" title="Ir para a página de login">Entrar</a>
        <a href="index.php?action=register" title="Ir para a página de registo">Registar</a>
    <?php else: ?>
        <a href="" title="Ir para a pagina de perfil">Perfil</a>
        <a href="">Sair</a>
    <?php endif ?>
</nav>