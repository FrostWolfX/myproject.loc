<?php

namespace MyProject\Models\Comments;

use MyProject\Controllers\CommentsController;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Services\Db;

class Comment extends ActiveRecordEntity
{
	protected $authorId;
	protected $articleId;
	protected $text;
	protected $createAt;

	public static function getNameTable(): string
	{
		return 'comments';
	}

	/**
	 * @return mixed
	 */
	public function getText()
	{
		return $this->text;
	}

	/**
	 * @param mixed $text
	 */
	public function setText($text): void
	{
		$this->text = $text;
	}

	/**
	 * @return mixed
	 */
	public function getArticleId()
	{
		return $this->article_id;
	}

	/**
	 * @param mixed $articleId
	 */
	public function setArticleId($articleId): void
	{
		$this->articleId = $articleId;
	}

	/**
	 * @return mixed
	 */
	public function getCreateAt()
	{
		return $this->createAt;
	}

	/**
	 * @param mixed $createAt
	 */
	public function setCreateAt($createAt): void
	{
		$this->createAt = $createAt;
	}

	/**
	 * @param mixed $authorId
	 */
	public function setAuthorId($authorId): void
	{
		$this->authorId = $authorId;
	}

	/**
	 * @return mixed
	 */
	public function getAuthorId()
	{
		return $this->authorId;
	}

	public static function findAllByCollumn(string $columnName, string $value)
	{
		$db = Db::getInstance();

		$result = $db->query(
			'SELECT * FROM `' . static::getNameTable() . '` WHERE `' . $columnName . '` = :value;',
			[':value' => $value],
			static::class
		);

		if ($result === []) {
			return null;
		}
		return $result;
	}
}