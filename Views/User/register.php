<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Registar</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Common/alert.php' ?>

    <main class="content">
        <form action="index.php?action=register" method="post" >

            <label for="username">Nome de Utilizador:</label>
            <input type="text" autocomplete="username" placeholder="ex. IloveFantasia" minlength="3" maxlength="50" id="user_name" name="user_name" required pattern="\S+"><br>

            <label for="email">Email:</label>
            <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" id="email" name="email" require pattern="\S+"d><br>

            <label for="password">Palavra-passe:</label>
            <input type="password" autocomplete="new-password" minlength="8" id=password name=password required><br>

            <label for="password">Confirmar Palava-passe</label>
            <input type="password" minlength="8" required><br>

            <label>
                <input type="checkbox" id="agreement" name="agreement" required>
                <span>Li e aceito a <a href="TO-DO" target="_blank">política de privacidade</a>.</span>
            </label><br>

            <button type="submit">Registar</button>
    </main>

    </form>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>