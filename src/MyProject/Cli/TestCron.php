<?php

namespace MyProject\Cli;

class TestCron extends AbstractCommand{

	function execute()
	{
		$this->getParam('x');
		$this->getParam('y');

	}

	protected function checkParams()
	{
		// чтобы проверить работу скрипта, будем записывать в файлик 1.log текущую дату и время
		file_put_contents('N:\\1.log', date(DATE_ISO8601) . PHP_EOL, FILE_APPEND);
	}
}