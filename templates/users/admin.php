<tr>
    <td colspan="2" style="text-align: right">
		<?php if (!empty($user)): ?>
            <p>Привет, <?= $user->getNickname() ?> |
                <a href="/../users/logout" name="exit">Выход</a>
            </p>
            <a href="/../articles/add">Добавить статью</a>
		<?php else: ?>
            <a href="/../users/login">Вход</a> |
            <a href="/../users/register">Регистрация</a>
		<?php endif; ?>

    </td>
</tr>
