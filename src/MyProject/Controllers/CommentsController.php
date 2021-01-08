<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Comments\Comment;

class CommentsController
{
	public function show(int $idArticle)
	{
		$comment = Comment::findAllByCollumn('article_id', $idArticle);

		if ($comment === null){
			throw new NotFoundException();
		}
		return $comment;
	}
}