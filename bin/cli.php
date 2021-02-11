<?php
unset($argv[0]);

$params = [];
foreach ($argv as $item) {
	preg_match('~^(.+)=(.+)$~', $item, $matches);
	if (!empty($matches)){
		$paramName = $matches[1];
		$paramValue = $matches[2];

		$params[$paramName] = $paramValue;
	}
}
var_dump($params);