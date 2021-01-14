<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class AdminController extends AbstractController
{
	public function view(int $page = 1)
	{
		if ($this->user === null) {
			throw new UnauthorizedException();
		}
		if (!$this->user->isAdmin()) {
			throw new ForbiddenException();
		}
		if (preg_match('~^admin/view/(\d+)$~', $_GET['route'], $number)) {
			$page = $number[1];
		}
		$countAllArticles = ceil(count(Article::findAll()) / 5);
		$articles = Article::findLast5Article(5 * $page);
		$this->view->renderHtml('admin/view.php',
			['articles' => $articles, 'countAllArticles' => $countAllArticles, 'page' => (int)$page]);
	}

	public function viewComments(int $page = 1)
	{
		if ($this->user === null) {
			throw new UnauthorizedException();
		}
		if (!$this->user->isAdmin()) {
			throw new ForbiddenException();
		}
		if (preg_match('~^admin/viewComments/(\d+)$~', $_GET['route'], $number)) {
			$page = $number[1];
		}
		$countAllComments = ceil(count(Article::findAll()) / 5);
		$comments = Comment::findLast5Comments(5 * $page);
		$this->view->renderHtml('admin/viewComments.php',
			['comments' => $comments, 'countAllComments' => $countAllComments, 'page' => (int)$page]);
	}
}