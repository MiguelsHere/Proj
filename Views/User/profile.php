<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Perfil</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Common/alert.php' ?>

    <form action="index.php?action=profile" method="post" class="content">

        <label for="username">Nome de Utilizador:</label>
        <input type="text" autocomplete="username" placeholder="ex. IloveFantasia" minlength="3" maxlength="50" id="username" name="username" required><br>

        <label for="user_description">Description:</label>
        <textarea id="user_description" name="user_description"></textarea>

        <label for="birth">Birth date:</label>
        <input type="date" autocomplete="bday" id="birth" name="birth">

        <label for="public">
            <input type="checkbox" id="public" name="public">
            <span>Perfil Publico</span>
        </label>

        <button type="submit">Atualizar</button>
    </form>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>