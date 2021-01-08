<form action="" method="post">
    <h3>Добавить комментарий</h3>
    <textarea name="text" id="text" cols="80" rows="10"></textarea>
    <input type="submit" value="Добавить">
</form>

<?php if (!empty($comments)): ?>
	<?php foreach ($comments as $comment): ?>
    <p style="color: red"></p>
        <p><?= $comment->getText() ?></p>
        <hr>
	<?php endforeach; ?>
<?php endif; ?>