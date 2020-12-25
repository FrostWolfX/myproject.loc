<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Views\View;

class MainController
{
	private View $view;

	public function __construct()
	{
		$this->view = new View('/../../../templates');
	}

	public function main()
	{
		/**
		 * получаю статьи
		 */
		$articles = Article::findAll();
		/*
		 * загружаю страницу view пользователю
		 */
		$this->view->renderHtml('main/main.php', ['articles' => $articles, 'title' => 'Главная страница']);
	}

	public function sayHello(string $name)
	{
		$this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
	}

	public function sayBye(string $name)
	{
		$this->view->renderHtml('main/bye.php', ['name' => $name, 'title' => 'Страница выхода']);
	}

	public function store()
	{
		$this->view->renderHtml('main/store.php', ['title' => 'Магазин']);
	}
}