<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\Db;
use MyProject\Views\View;

class ArticlesController
{
	private View $view;

	public function __construct()
	{
		$this->view = new View('/../../../templates');
	}

	public function view(int $idArticle)
	{
		/**
		 * получаю статьи
		 */
		$article = Article::getById($idArticle);

		if ($article === null) {
			$this->view->renderHtml('errors/404.php', [], 404);
			return;
		}
		/*
		 * загружаю страницу view пользователю
		 */
		$this->view->renderHtml('articles/view.php',
			[
				'article' => $article
			]
		);
	}
}