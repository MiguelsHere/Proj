<!DOCTYPE html>
<html lang="pt">

<head>
    <?php require_once 'Views/Common/head.php' ?>
    <title>Bookshelf Review: Livros</title>
</head>

<body>
    <?php require_once 'Views/Common/nav.php' ?>

    <?php if (empty($books)): ?>
        <p class="content">Ainda não há livros.</p>
    <?php else: ?>
        <?php foreach ($books as $book): ?>
            <div class="book">
                <a href=""><?= htmlspecialchars($book['title']) ?></a>
            </div>
        <?php endforeach ?>
    <?php endif ?>

    <?php require_once 'Views/Common/footer.php' ?>
</body>

</html>