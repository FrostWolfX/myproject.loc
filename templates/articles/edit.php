<?php include __DIR__ . '/../header.php'; ?>

    <h1>Редактирование</h1>
<?php if ($error): ?>
    <div style="color: red"> <?= $error; ?></div>
<?php endif; ?>

    <form action="/articles/<?= $article->getId() ?>/edit" method="post">
        <label for="name">Название статьи</label><br>
        <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? $article->getName() ?>" size="50"><br>

        <label for="text">Текст статьи</label>
        <textarea name="text" id="text" cols="80" rows="10"><?= $_POST['text'] ?? $article->getText() ?>
    </textarea><br>

        <input type="submit" value="Обновить">
    </form>

<?php include __DIR__ . '/../footer.php'; ?>