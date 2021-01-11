<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error; ?></div>
<?php endif; ?>
<?php if (!empty($user)): ?>
    <form action="/articles/<?= $article->getId(); ?>/comments" method="post">
        <h3>Добавить комментарий</h3>
        <input type="hidden" name="articleId" value="<?= $article->getId(); ?>">
        <textarea name="text" id="text" cols="80" rows="10"></textarea>
        <input type="submit" value="Добавить">
    </form>
<?php else: ?>
    <p style="font-weight: bold; text-align: center;">Необходимо войти/зарегистрироваться для добавления комментария.</p>
<?php endif; ?>


<?php if (!empty($comments)): ?>
	<?php foreach ($comments as $comment): ?>
        <p>
            <label style="color: red; font-size: medium;">
				<?php echo $comment->getAuthor()->getNickname(); ?>
            </label>
            comment<?= $comment->getCreateAt(); ?>
        </p>
        <p id="comment<?=$comment->getId() ?>"><?= htmlspecialchars($comment->getText()) ?></p>
        <hr>
	<?php endforeach; ?>
<?php endif; ?>
