<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Perfil</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php require_once 'Views/Common/alert.php' ?>

    <!-- Só amostrar a form quand o utilizador clicar num botão -->
    <?php if ($info['user_name'] == $_SESSION['user_name']): ?>
        <main class="content">
            <form action="index.php?action=profile" method="post">

                <h3>Dados do Perfil</h3><br>
                <label for="username">Nome de Utilizador:</label>
                <input type="text" autocomplete="username" placeholder="ex. IloveFantasia" minlength="3" maxlength="50" id="username" name="username" value="<?= htmlspecialchars($info['user_name']) ?>" required pattern="\S+"><br>

                <label for="user_description">Descrição:</label>
                <textarea id="user_description" name="user_description"><?= htmlspecialchars($info['user_description']) ?></textarea><br>

                <label for="birth">Data de nascimento:</label>
                <input type="date" autocomplete="bday" id="birth" name="birth" value="<?= $info['birth_date'] ?>"><br>

                <label for="public">
                    <input type="checkbox" id="public" name="public"
                        <?php if ($info['is_public']):
                            echo "checked=true"  ?>
                        <?php endif ?>>
                    <span>Perfil Publico</span>
                </label><br><br>

                <h3>Dados da conta</h4><br>
                    <div>
                        <label for="password">Palavra-passe:</label>
                        <input type="password" autocomplete="current-password" minlength="8" id=password name=password required><br>

                        <label for="email">Email:</label>
                        <input type="email" autocomplete="email" placeholder="ex. exemplo@gmail.com" id="email" name="email" required pattern="\S+" value="<?= $info['email'] ?>"><br>

                        <label for="new_password">Nova Palavra-passe:</label>
                        <input type="new_password" autocomplete="new-password" minlength="8" id=password name=password required><br>

                    </div><br>

                    <button type="submit">Atualizar</button>
            </form><br>
            <p>Criada em <?= $info['created_in'] ?></p>
        </main>
    <?php else: ?>
        <main class="content">

            <h2> <?= htmlspecialchars($info['user_name']) ?></h2>

            <h3>Descrição:</h3>
            <p><?= htmlspecialchars($info['user_description']) ?></p>

            <h3>Data de nascimento:</h3>
            <p> <?= $info['birth_date'] ?> </p>

            <button type="submit">Atualizar</button>

            <p>Criada em <?= $info['created_in'] ?></p>
        </main>
    <?php endif ?>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>