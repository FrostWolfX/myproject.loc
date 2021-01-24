<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Services\UsersAuthService;
use MyProject\Views\View;

class MainController extends AbstractController
{
	public function main(int $page = 1)
	{
		/**
		 * получаю статьи
		 */
		//$articles = Article::findAll();
		$popularArticles = Article::findPopularArticle();

		/*
		 * Получаю все статьи сортируя по дате и выводя постранично
		 */
		if (preg_match('~^main/(\d+)$~', $_GET['route'], $number)) {
			$page = $number[1];
		}
		$countAllArticles = ceil(count(Article::findAll()) / 5);
		$articles = Article::findLast5Article(5 * $page);
		/*
		 * загружаю страницу view пользователю
		 */
		$this->view->renderHtml('main/main.php', [
			'articles' => $articles, 'countAllArticles' => $countAllArticles, 'page' => (int)$page,
			'popularArticles' => $popularArticles,
			'title' => 'Главная страница'
		]);
	}
}