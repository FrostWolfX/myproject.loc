<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>
		<?= $title ?? 'Мой блог'; ?>
    </title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
			<?= $title ?? 'Мой блог' ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
			<?php if (!empty($user)): ?>
                <p>Привет, <?= $user->getNickname() ?> |
                    <a href="/../users/logout" name="exit">Выход</a>
                </p>

			<?php else: ?>
                <a href="/../users/login">Вход</a> |
                <a href="/../users/register">Регистрация</a>
			<?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>