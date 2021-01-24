<?php
return [
	'~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
	'~^main/(\d+)$~' => [\MyProject\Controllers\MainController::class, 'main'],
	'~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
	'~^articles/(\d+)#comment\d+$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
	'~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
	'~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
	'~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
	'~^articles/(\d+)/comments$~' => [\MyProject\Controllers\CommentsController::class, 'add'],
	'~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
	'~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
	'~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
	'~^users/logout$~' => [\MyProject\Controllers\UsersController::class, 'logout'],
	'~^profile$~' => [\MyProject\Controllers\UsersController::class, 'profile'],
	'~^admin/view/(\d+)$~' => [\MyProject\Controllers\AdminController::class, 'view'],
	'~^admin/comments/(\d+)$~' => [\MyProject\Controllers\AdminController::class, 'viewComments'],
	'~^comment/(\d+)/edit$~' => [\MyProject\Controllers\CommentsController::class, 'edit'],
];