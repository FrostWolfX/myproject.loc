<?php

namespace MyProject\Cli;

class Minusator extends AbstractCommand{

	function execute()
	{
		return $this->getParam('a') - $this->getParam('b');
	}

	protected function checkParams()
	{
		$this->ensureParamExits('a');
		$this->ensureParamExits('b');
	}
}