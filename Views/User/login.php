<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Login</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Common/alert.php' ?>

    <main class="content">
        <form action="index.php?action=login" method="post">

            <label for="email">Email:</label>
            <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" id="email" name="email" required pattern="\S+"><br>

            <label for="password">Palavra-passe:</label>
            <input type="password" autocomplete="current-password" minlength="8" id=password name=password required><br>

            <button type="submit">Entrar</button>

        </form>
    </main>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>