<?php

namespace MyProject\Models\Users;

use MyProject\Models\Articles\Article;


class User
{
	private $id;
	private $nickname;
	private $email;
	private $is_confirmed;
	private $role;
	private $password_hash;
	private $auth_token;
	private $created_at;


	public function __set(string $name, string $value)
	{
		$camelCaseName = $this->underscoreToCamelCase($name);
		$this->$camelCaseName = $value;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getNickname(): string
	{
		return $this->nickname;
	}

	private function underscoreToCamelCase(string $source): string
	{
		return lcfirst(str_replace('_', '', ucwords($source, '_')));
	}
}