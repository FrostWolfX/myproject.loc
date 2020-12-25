<?php
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
if (empty($matches)) {
	echo 'Страница не найдена';
	return;
}
unset($matches[0]);

$controllerName = $controllerAndAction[0];
$actionName = $controllerAndAction[1];

$controller = new $controllerName();
$controller->$actionName(...$matches);

var_dump(\MyProject\Services\Db::getInstanceCount());