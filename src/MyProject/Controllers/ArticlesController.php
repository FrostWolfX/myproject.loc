<?php

namespace MyProject\Controllers;

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
    			INNER JOIN `users` AS u 
    			ON a.author_id = u.id 
				WHERE a.id = :id;',
			[':id' => $articleId]
		);

		if ($result === []) {
			$this->view->renderHtml('errors/404.php', [], 404);
			return;
		}

		$this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
	}
}