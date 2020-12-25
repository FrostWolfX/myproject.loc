<?php

namespace MyProject\Models\Articles;

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
	 * @return string
	 */
	public function getText(): string
	{
		return $this->text;
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
	 * @return string
	 */
	public function getCreatedAt(): string
	{
		return $this->createdAt;
	}

	/*
	 * Передаю в запрос в модели родителя ActiveRecordEntity название таблицы
	 */
	protected static function getNameTable(): string
	{
		return 'articles';
	}
}