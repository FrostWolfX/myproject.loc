<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;

class MainController
{
	/** @var View */
	private View $view;

	/** @var Db */
	private $db;

	public function __construct()
	{
		$this->view = new View(__DIR__ . '/../../templates');
		$this->db = new Db();
	}

	public function main()
	{
		$articles = $this->db->query('SELECT * FROM `articles`;');
		$this->view->renderHtml('main/main.php', ['articles' => $articles, 'title' => 'Мой блог']);
	}

	public function sayHello(string $name)
	{
		$this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
	}

	public function sayBye(string $name)
	{
		$this->view->renderHtml('main/bye.php', ['name' => $name, 'title' => 'Страница выхода']);
	}
}