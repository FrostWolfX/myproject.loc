<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Views\View;

class ArticlesController extends AbstractController
{
	public function view(int $idArticle)
	{
		/**
		 * получаю статьи
		 */
		$article = Article::getById($idArticle);

		if ($article === null) {
			throw new NotFoundException();
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
			throw new NotFoundException();
		}

		$article->setName('1111');
		$article->setText('22222');
		$article->save();
	}

	public function add(): void
	{
		$author = User::getById(1);

		$article = new Article();
		$article->setAuthor($author);
		$article->setName('Новое название статьи');
		$article->setText('Новый текст статьи');

		$article->save();

		header('Location: http://myproject.loc/index.php');
	}

	public function delete(int $idArticle){
		$article = Article::getById($idArticle);
		if ($article === null) {
			throw new NotFoundException();
		}
		$article->delete();
		var_dump($article);
	}
}