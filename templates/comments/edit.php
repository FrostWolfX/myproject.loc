<?php include __DIR__ . '/../header.php'; ?>

	<h1>Редактирование</h1>
<?php if ($error): ?>
	<div style="color: red"> <?= $error; ?></div>
<?php endif; ?>

	<form action="/comment/<?= $comment->getId() ?>/edit" method="post">
		<label for="text">Комментарий</label>
		<textarea name="text" id="text" cols="80" rows="10"><?= $_POST['text'] ?? $comment->getText() ?></textarea><br>

		<input type="submit" value="Обновить">
	</form>

<?php include __DIR__ . '/../footer.php'; ?>