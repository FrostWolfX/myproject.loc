<?php

namespace MyProject\Cli;

class Summator extends AbstractCommand
{
	protected function checkParams()
	{
		$this->ensureParamExits('a');
		$this->ensureParamExits('b');
	}

	public function execute()
	{
		return $this->getParam('a') + $this->getParam('b');
	}

}