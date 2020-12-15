<?php include_once __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article['id'] ?>"><?= $article['name'] ?></a></h2>
    <p><?= $article['text'] ?></p>
    <hr>
<?php endforeach; ?>
<?php include_once __DIR__ . '/../footer.php';