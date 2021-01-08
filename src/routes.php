<?php
return [
	'~hello/(.*)~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
	'~bye/(.*)~' => [\MyProject\Controllers\MainController::class, 'sayBye'],
	'~store~' => [\MyProject\Controllers\MainController::class, 'store'],
	'~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
	'~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
	'~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
	'~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
	'~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
	'~^articles/(\d+)/comments$~' => [\MyProject\Controllers\CommentsController::class, 'view'],
	'~^users/register$~'=>[\MyProject\Controllers\UsersController::class, 'signUp'],
	'~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
	'~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
	'~^users/logout$~' => [\MyProject\Controllers\UsersController::class, 'logout'],
];