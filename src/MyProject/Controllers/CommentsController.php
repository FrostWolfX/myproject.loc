<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController
{
	public function show(int $idArticle)
	{
		$comment = Comment::findAllByCollumn('article_id', $idArticle);

		return $comment;
	}

	public function add()
	{
		if ($this->user === null) {
			throw new UnauthorizedException();
		}

		if (!empty($_POST)) {
			try {
				$comment = Comment::createFromArray($_POST, $this->user,);
			} catch (InvalidArgumentException $exception) {
				$this->view->renderHtml('errors/commentsError.php', ['articleId' => $_POST['articleId'], 'error' => $exception->getMessage()], 404);
				return;
			}
			header('Location: /articles/' . $_POST['articleId'] . '#comment' . $comment->getId(), true, 302);
			exit();
		} else {
			$this->view->renderHtml('errors/404.php');
		}
	}
}