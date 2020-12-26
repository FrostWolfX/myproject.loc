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

	public function edit(int $idArticle): void
	{
		$article = Article::getById($idArticle);

		if ($article === null) {
			$this->view->renderHtml('errors/404.php', [], 404);
			return;
		}

		$article->setName('Статья про ежей');
		$article->setText('Еж бежал по дорожке, на спине нес...');
		$article->save();
	}
	public function create(): void
	{
		$article = new Article();

		$article->setAuthorId(2);
		$article->setName('Статья про ежей');
		$article->setText('Еж бежал по дорожке, на спине нес...');
		$article->setCreatedAt(date("Y-m-d H:i:s"));
		$article->save();
	}
}