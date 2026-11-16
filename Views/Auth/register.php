<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Registar</title>
</head>



<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Commons/alert.php' ?>

    <form action="TO-DO" method="post">
        
        <label>Nome de Utilizador:</label>
        <input type="text" autocomplete="username" placeholder="ex. IloveFantasia" minlength="3" maxlength="50" required>

        <label>Email:</label>
        <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" required>

        <label>Palavra-passe:</label>
        <input type="password" autocomplete="new-password" minlength="8" required>

        <label>Confirmar Palava-passe</label>
        <input type="password" autocomplete="new-password" minlength="8" required>

        <button type="submit">Registar</button>

    </form>

    <?php require_once 'Views/Common/footer.php' ?>
</body>


</html>