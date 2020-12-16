<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Services\Db;
use MyProject\View\View;

class ArticlesController
{
	/** @var View */
	private $view;

	/** @var Db */
	private $db;

	public function __construct()
	{
		$this->view = new View(__DIR__ . '/../../templates');
		$this->db = new Db();
	}


	public function view(int $articleId)
	{
		$result = $this->db->query(
			'SELECT * FROM `articles` AS a 
				WHERE a.id = :id;',
			[':id' => $articleId],
			Article::class
		);

		if ($result === []) {
			$this->view->renderHtml('errors/404.php', [], 404);
			return;
		}
		$author = $this->db->query(
			'SELECT * FROM `users` AS u 
				WHERE u.id = :id;',
			[':id' => $result[0]->getId()],
			User::class);

		$this->view->renderHtml('articles/view.php', ['article' => $result[0], 'author' => $author[0]]);
	}
}