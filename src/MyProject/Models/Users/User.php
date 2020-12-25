<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
	protected string $nickname;
	protected string $email;
	protected int $isConfirmed;
	protected string $role;
	protected string $password_hash;
	protected string $authToken;

	/**
	 * @return string
	 */
	public function getNickname(): string
	{
		return $this->nickname;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

	/*
	 * Передаю в запрос в модели родителя ActiveRecordEntity название таблицы
	 */
	protected static function getNameTable(): string
	{
		return 'users';
	}
}