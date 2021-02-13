<?php

try {
	unset($argv[0]);


	//функция автозагрузки
	spl_autoload_register(function (string $className) {
		include_once __DIR__ . '/../src/' . $className . '.php';
	});

	//составляем полное имя класса, добавив namespase
	$className = '\\MyProject\\Cli\\' . array_shift($argv);
	if (!class_exists($className)) {
		throw new \MyProject\Exceptions\CliException('Class "' . $className . '" not found.');
	}

	//подготавливаем список аргументов
	$params = [];
	foreach ($argv as $item) {
		preg_match('~^(.+)=(.+)$~', $item, $matches);
		if (!empty($matches)) {
			$paramName = $matches[1];
			$paramValue = $matches[2];

			$params[$paramName] = $paramValue;
		}
	}

	//проверка что класс указанный в качестве аргумента, является наследником класса AbstractCommand
	if (!is_subclass_of($className, \MyProject\Cli\AbstractCommand::class)) {
		throw new \MyProject\Exceptions\CliException('Class "' . $className . '" is not subclass of AbstractCommand');
	}


	//создаем экземпляр класса, передав параметры, вызывая метод execute
	$class = new $className($params);
	echo $class->execute();
} catch (\MyProject\Exceptions\CliException $cliException) {
	echo 'Error ' . $cliException->getMessage();
}