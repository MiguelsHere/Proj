<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Registar</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Common/alert.php' ?>

    <form action="index.php?action=register" method="post">

        <label>Nome de Utilizador:</label>
        <input type="text" autocomplete="username" placeholder="ex. IloveFantasia" minlength="3" maxlength="50" id="username" name="username" required>

        <label>Email:</label>
        <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" id="email" name="email" required>

        <label>Palavra-passe:</label>
        <input type="password" autocomplete="new-password" minlength="8" id=password name=password required>

        <label>Confirmar Palava-passe</label>
        <input type="password" minlength="8" required>

        <label>
            <input type="checkbox" id="agreement" name="agreement" required>
            <span>Li e aceito a <a href="TO-DO" target="_blank">política de privacidade</a>.</span>
        </label>

        <button type="submit">Registar</button>

    </form>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>