<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
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
		if ($this->user === null) {
			throw new UnauthorizedException();
		}
		if (!$this->user->isAdmin()) {
			throw new ForbiddenException();
		}

		if (!empty($_POST)) {
			try {
				$article = Article::createFromArray($_POST, $this->user);
			} catch (InvalidArgumentException $exception) {
				$this->view->renderHtml('articles/add.php', ['error' => $exception->getMessage()]);
				return;
			}
			header('Location: /', $article->getId(), 302);
			exit();
		}

		$this->view->renderHtml('articles/add.php');
	}


	public function delete(int $idArticle)
	{
		$article = Article::getById($idArticle);
		if ($article === null) {
			throw new NotFoundException();
		}
		$article->delete();
		var_dump($article);
	}
}