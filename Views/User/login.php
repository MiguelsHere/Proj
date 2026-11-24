<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Login</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Common/alert.php' ?>

    <form action="index.php?action=login" method="post">

        <label for="email">Email:</label>
        <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" id="email" name="email" required>

        <label for="email">Palavra-passe:</label>
        <input type="password" autocomplete="current-password" minlength="8" id=password name=password required>

        <button type="submit">Entrar</button>

    </form>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>