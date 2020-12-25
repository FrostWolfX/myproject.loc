<?php

namespace MyProject\Models;

use MyProject\Services\Db;

abstract class ActiveRecordEntity
{

	protected int $id;

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @param $name
	 * @param $value
	 * Изменяю пришедшие названия свойств таблицы на заданные выше имена свойств
	 */
	public function __set($name, $value)
	{
		$camelCase = $this->underscoreToCamelCase($name);
		$this->$camelCase = $value;
	}

	/**
	 * @param string $source
	 * @return string
	 * Поля таблицы типа $atricle_id привожу к виду $articleId
	 */
	private function underscoreToCamelCase(string $source): string
	{
		/*
		 * Преобразовать первую букву каждого слова в верхний регистр
		 */
		$firstLetterInWordsUpRegister = ucwords($source, '_');
		/*
		 * Заменить нижнее подчеркивание
		 */
		$replaceSimbol = str_replace('_', '', $firstLetterInWordsUpRegister);
		/*
		 * Первую букву преобразовать в нижний регистр
		 */
		return lcfirst($replaceSimbol);
	}

	/**
	 * @param int $id
	 * @return static|null
	 * Получаю объект нужной таблицы
	 * в static::class автоматически подставится класс, в котором этот метод определен. Это позднее статическое
	 * связывание. код, который будет зависеть от класса, в котором он вызывается, а не в котором он описан
	 */
	public static function getById(int $id): ?self
	{
		$db = Db::getInstance();
		$entities = $db->query(
			'SELECT * FROM `' . static::getNameTable() . '` WHERE id =:id;',
			[':id' => $id],
			static::class
		);
		return $entities ? $entities[0] : null;
	}

	/**
	 * @return array
	 * Получаю всю таблицу объектом через статическое связывание static::class
	 * код, будет зависеть от класса, в котором он вызывается
	 */
	public static function findAll(): array
	{
		$db = Db::getInstance();
		return $db->query('SELECT * FROM `' . static::getNameTable() . '`', [], static::class);
	}

	abstract protected static function getNameTable(): string;

}