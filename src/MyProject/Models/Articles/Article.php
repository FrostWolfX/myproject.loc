<?php

namespace MyProject\Models\Articles;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;

class Article extends ActiveRecordEntity
{
	protected int $authorId;
	protected string $name;
	protected string $text;
	protected string $createdAt;

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
	}

	/**
	 * @param string $text
	 */
	public function setText(string $text): void
	{
		$this->text = $text;
	}

	/**
	 * @return User
	 * LazyLoad ленивая загрузка. Данные по автору загрузятся по запросу
	 */
	public function getAuthor(): User
	{
		return User::getById($this->authorId);
	}

	/**
	 * @param User $author
	 */
	public function setAuthor(User $author): void
	{
		$this->authorId = $author->getId();
	}

	/**
	 * @return string
	 */
	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}

	/**
	 * @param string $createdAt
	 */
	public function setCreatedAt(string $createdAt)
	{
		$this->createdAt = $createdAt;
	}

	/*
	 * Передаю в запрос в модели родителя ActiveRecordEntity название таблицы
	 */
	protected static function getNameTable(): string
	{
		return 'articles';
	}

	public static function createFromArray(array $fields, User $author): Article
	{
		if (empty($fields['name'])){
			throw new InvalidArgumentException('Не передано название статьи');
		}
		if (empty($fields['text'])){
			throw new InvalidArgumentException('Не передан текст статьи');
		}

		$article = new Article();

		$article->setAuthor($author);
		$article->setName($fields['name']);
		$article->setText($fields['text']);

		$article->save();

		return $article;
	}
}