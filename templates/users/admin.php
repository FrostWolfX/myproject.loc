<tr>
    <td colspan="2" style="text-align: right">
		<?php if (!empty($user)): ?>
            <p>Привет, <?= $user->getNickname() ?> |
                <a href="/../users/logout" name="exit">Выход</a>
            </p>
			<?php if ($user->isAdmin()): ?>
                <a href="/../articles/add">Добавить статью</a> |
                <a href="/../admin/view/1">Последнии статьи</a> |
                <a href="/../admin/comments/1">Комментарии</a>
			<? endif; ?>
		<?php else: ?>
            <a href="/../users/login">Вход</a> |
            <a href="/../users/register">Регистрация</a>
		<?php endif; ?>

    </td>
</tr>
