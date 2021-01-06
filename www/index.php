<?php
try {
	/*
 * Автозагрузка файлов, через аннонимную функцию
 */
	spl_autoload_register(function (string $className) {
		require_once __DIR__ . '/../src/' . $className . '.php';
	});

	$routes = require __DIR__ . '/../src/routes.php';
	$route = $_GET['route'] ?? '';

	$isRouteFound = false;
	foreach ($routes as $pattern => $controllerAndAction) {
		preg_match($pattern, $route, $matches);
		if (!empty($matches)) {
			$isRouteFound = true;
			break;
		}
	}
	if (!$isRouteFound) {
		throw new \MyProject\Exceptions\NotFoundException();
	}
	unset($matches[0]);

	$controllerName = $controllerAndAction[0];
	$actionName = $controllerAndAction[1];

	$controller = new $controllerName();
	$controller->$actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
	$view = new \MyProject\Views\View('/../../../templates/errors');
	$view->renderHtml('500.php', ['error' => $e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e) {
	$view = new \MyProject\Views\View('/../../../templates/errors');
	$view->renderHtml('404.php', ['error' => $e->getMessage()], 404);
}


/*interface MyPacketThrowable extends Throwable
{
}

class MyPackExeption extends Exception implements MyPacketThrowable
{
}

try {
	throw new MyPackExeption();
} catch (Throwable $e) {
	echo 'thro222222222222';
}*/