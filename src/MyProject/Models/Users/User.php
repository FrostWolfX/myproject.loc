<?php

namespace MyProject\Models\Users;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
	protected string $nickname;
	protected string $email;
	protected int $isConfirmed;
	protected string $role;
	protected string $passwordHash;
	protected string $authToken;
	protected string $createdAt;

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

	/**
	 * @return int
	 */
	public function isConfirmed(): int
	{
		return $this->isConfirmed;
	}

	/**
	 * @return string
	 */
	public function getPasswordHash(): string
	{
		return $this->passwordHash;
	}

	/**
	 * @return string
	 */
	public function getAuthToken(): string
	{
		return $this->authToken;
	}

	/**
	 * @return string
	 */
	public function getRole(): string
	{
		return $this->role;
	}

	/*
	 * Передаю в запрос в модели родителя ActiveRecordEntity название таблицы
	 */
	protected static function getNameTable(): string
	{
		return 'users';
	}

	public static function signUp(array $userData): User
	{
		if (empty($userData['nickname'])) {
			throw new InvalidArgumentException('Не передан nickname или такое имя уже существует');
		}
		if (!preg_match('/^[a-zA-Z0-9]{3,}$/', $userData['nickname'])) {
			throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита и цифр и не менее 3 символов.');
		}
		if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
			throw new InvalidArgumentException('Пользователь с таким nickname уже существует');
		}

		if (empty($userData['email'])) {
			throw new InvalidArgumentException('Не передан email');
		}
		if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
			throw new InvalidArgumentException('Email некорректен');
		}
		if (static::findOneByColumn('email', $userData['email'])) {
			throw new InvalidArgumentException('Пользователь с таким email уже существует');
		}

		if (empty($userData['password'])) {
			throw new InvalidArgumentException('Не передан пароль');
		}
		if (strlen($userData['password']) < 8) {
			throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
		}

		$user = new User();
		$user->nickname = $userData['nickname'];
		$user->email = $userData['email'];
		$user->password_hash = password_hash($userData['password'], PASSWORD_DEFAULT);
		$user->isConfirmed = false;
		$user->role = 'user';
		$user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
		$user->save();

		return $user;
	}

	public function activate(): void
	{
		$this->isConfirmed = true;
		$this->save();
	}

	public static function login(array $loginData): User
	{
		if (empty($loginData['email'])) {
			throw new InvalidArgumentException('Не передан email');
		}
		if (empty($loginData['password'])) {
			throw new InvalidArgumentException('Не передан пароль');
		}

		$user = User::findOneByColumn('email', $loginData['email']);
		if ($user === null) {
			throw new InvalidArgumentException('Нет пользователя с таким email');
		}
		if (!password_verify($loginData['password'], $user->getPasswordHash())) {
			throw new InvalidArgumentException('Неверный пароль');
		}
		if (!$user->isConfirmed()) {
			throw new InvalidArgumentException('Пользователь не подтвержден');
		}

		$user->refreshAuthToken();
		$user->save();

		return $user;
	}

	public function refreshAuthToken()
	{
		$this->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
	}

	public function isAdmin(): bool
	{
		if ($this->getRole() !== 'admin') {
			return false;
		}
		return true;
	}
}