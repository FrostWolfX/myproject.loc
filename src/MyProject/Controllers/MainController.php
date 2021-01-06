<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\UsersAuthService;
use MyProject\Views\View;

class MainController extends AbstractController
{
	public function main()
	{
		/**
		 * получаю статьи
		 */
		$articles = Article::findAll();
		/*
		 * загружаю страницу view пользователю
		 */
		$this->view->renderHtml('main/main.php', [
			'articles' => $articles,
			'title' => 'Главная страница'
		]);
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