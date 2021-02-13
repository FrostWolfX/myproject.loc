<?php

namespace MyProject\Cli;

use MyProject\Exceptions\CliException;

abstract class AbstractCommand
{
	private $params;

	public function __construct(array $params)
	{
		$this->params = $params;
		$this->checkParams();
	}

	protected function ensureParamExits(string $paramName)
	{
		if (!isset($this->params[$paramName])) {
			throw new CliException('Param with name "' . $paramName . '" is not set.');
		}
	}

	protected function getParam(string $paramName)
	{
		return $this->params[$paramName] ?? null;
	}

	abstract function execute();
	abstract protected function checkParams();
}