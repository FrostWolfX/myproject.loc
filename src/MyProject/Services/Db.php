<?php

namespace MyProject\Services;

class Db
{
	private $pdo;
	private static $instance;

	private function __construct()
	{
		$dbOption = (require __DIR__ . '/../../settings.php')['db'];

		$this->pdo = new \PDO(
			'mysql:host=' . $dbOption['host'] . ';dbname=' . $dbOption['dbname'] . ';',
			$dbOption['user'],
			$dbOption['password'],
		);
	}

	/**
	 * @return mixed
	 * Проверять, что свойство $instance не равно null
	 * Если оно равно null, будет создан новый объект класса Db, а затем помещён в это свойство
	 * Вернёт значение этого свойства.
	 */
	public static function getInstance(): self
	{
		if (self::$instance == null) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * @param string $sql
	 * @param array $params
	 * @param string $className
	 * @return array|null
	 * Метод выполняет запрос к БД возвращая данные полученные из БД в виде объекта
	 */
	public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
	{
		$stm = $this->pdo->prepare($sql);
		$result = $stm->execute($params);

		if (false === $result) {
			return null;
		}

		/*
		 * возвращаю ORM данные таблицы объектом, чтобы работать через ООП
		 */
		return $stm->fetchAll(\PDO::FETCH_CLASS, $className);
	}
}