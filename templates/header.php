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
	<?php require __DIR__ . '/users/admin.php' ?>
    <tr>
        <td>