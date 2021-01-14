<?php include __DIR__ . '/../header.php'; ?>
<?php foreach ($comments as $comment): ?>

    <p style="text-align: right;">
		<?php if ($user->isAdmin()): ?>
            <a href="/comment/<?= $comment->getId() ?>/edit" style="color: blue;">Редактировать комментарий</a>
		<?php endif; ?>
    </p>

	<p><?= $comment->getAuthor()->getNickname(); ?></p>
	<p><?= $comment->getCreateAt(); ?></p>
	<p>
		<?php
		$text = $comment->getText();
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
<?php for ($i = 1; $i <= $countAllComments; $i++): ?>
	<?php if ($page === $i): ?>
		<a href="/../admin/comments/<?= $i; ?>
            " style="border: #90ee90 1px solid; padding: 5px; color: red; text-decoration: blue;"><?= $i; ?></a>
	<?php else: ?>
		<a href="/../admin/comments/<?= $i; ?>
            " style="border: #90ee90 1px solid; padding: 5px; color: green; text-decoration: none;"><?= $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>


<?php include __DIR__ . '/../footer.php'; ?>