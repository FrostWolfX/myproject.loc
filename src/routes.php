<?php
return [
	'~hello/(.*)~' => [\MyProject\Controllers\MainController::class, 'sayHello'],
	'~bye/(.*)~' => [\MyProject\Controllers\MainController::class, 'sayBye'],
	'~store~' => [\MyProject\Controllers\MainController::class, 'store'],
	'~^$~' => [\MyProject\Controllers\MainController::class, 'main'],
	'~^articles/(\d+)$~' => [\MyProject\Controllers\ArticlesController::class, 'view'],
	'~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
	'~^articles/create~' => [\MyProject\Controllers\ArticlesController::class, 'create'],
];