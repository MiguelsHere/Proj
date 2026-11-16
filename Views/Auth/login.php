<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Login</title>
</head>



<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Commons/alert.php' ?>

    <form action="TO-DO" method="post">

        <label>Email:</label>
        <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" required>

        <label>Palavra-passe:</label>
        <input type="password" autocomplete="current-password" minlength="8" required>

        <button type="submit">Registar</button>
        
    </form>

    <?php require_once 'Views/Common/footer.php' ?>
</body>


</html>