<?php include __DIR__ . '/../header.php'; ?>
<?php if (!empty($user)): ?>
	<?php if ($user->isAdmin()): ?>
        <a href="/articles/<?= $article->getId() ?>/edit">Редактировать статью</a>
	<?php endif; ?>
<?php endif; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p><?= $article->getCreatedAt() ?></p>
    <h3>Автор статьи <?= $article->getAuthor()->getNickname() ?></h3>
    <p>Email: <?= $article->getAuthor()->getEmail() ?></p>
    <hr>
<?php include __DIR__ . '/../footer.php'; ?>