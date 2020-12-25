<?php

namespace MyProject\Views;

class View
{
	private string $templePath;

	public function __construct(string $templePath)
	{
		$this->templePath = $templePath;
	}

	public function renderHtml(string $templePath, array $vars = [], int $code = 200)
	{
		http_response_code($code);
		extract($vars);
		/*
		 * записываю в буфер вывод шаблона
		 */
		ob_start();
		include __DIR__ . $this->templePath . '/' . $templePath;
		$buffer = ob_get_contents();
		ob_end_clean();

		echo $buffer;
	}
}