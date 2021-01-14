<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($articles as $article): ?>
    <a href="/../articles/<?= $article->getId(); ?>"><?= $article->getName() ?></a>

    <p style="text-align: right;">
		<?php if ($user->isAdmin()): ?>
            <a href="/articles/<?= $article->getId() ?>/edit" style="color: blue;">Редактировать статью</a>
		<?php endif; ?>
    </p>

    <p><?= $article->getCreatedAt(); ?></p>
    <p>
		<?php
		$text = $article->getText();
		$lenghtTextIs100 = strlen($text);
		if ($lenghtTextIs100 < 100) {
			echo $text;
		} else {
			echo substr($text, 0, 100) . '...';
		}
		?>
    </p>
    <hr>
<?php endforeach; ?>
<?php for ($i = 1; $i <= $countAllArticles; $i++): ?>
	<?php if ($page === $i): ?>
        <a href="/../admin/view/<?= $i; ?>
            " style="border: #90ee90 1px solid; padding: 5px; color: red; text-decoration: blue;"><?= $i; ?></a>
	<?php else: ?>
        <a href="/../admin/view/<?= $i; ?>
            " style="border: #90ee90 1px solid; padding: 5px; color: green; text-decoration: none;"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>


<?php include __DIR__ . '/../footer.php'; ?>