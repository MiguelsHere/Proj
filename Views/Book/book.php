<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Livros</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <main class="content">
        <?php if (empty($books)): ?>
            <h2>Ainda não há livros.</h3>
            <?php else: ?>
                <?php foreach ($books as $book): ?>
                    <div class="book">
                        <a href="">
                            <h3><?= htmlspecialchars($book['title']) ?></h4>
                                <h4><?= htmlspecialchars($book['author']) ?></h4>
                                <h4><?= htmlspecialchars($book['genre']) ?></h4>
                                <h5><?= htmlspecialchars($book['publisher']) ?></h5>
                                <h6><?= htmlspecialchars($book['ISBN']) ?></h6>
                        </a>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
    </main>
    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>