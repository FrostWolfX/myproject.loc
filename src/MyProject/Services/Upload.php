<?php

namespace MyProject\Services;

class Upload
{

	public static function checkPhoto(array $resource, string $userNickname): array
	{
		$file = $resource['photo'];
		$allowedExtensions = ['jpg', 'png', 'gif'];
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);

		$newName = $userNickname . ' ' . date("d-m-Y H+i+s");
		$newFilePath = __DIR__ . '/../../../www/img/photos/' . $newName . '.' . $extension;

		if (!in_array($extension, $allowedExtensions)) {
			return ['error' => 'Загрузка файлов с таким расширением запрещена!'];
		} elseif ($file['error'] !== UPLOAD_ERR_OK) {
			return ['error' => 'Ошибка при загрузке файла.'];
		} elseif (file_exists($newFilePath)) {
			return ['error' => 'Файл с таким именем уже существует'];
		} elseif (!move_uploaded_file($file['tmp_name'], $newFilePath)) {
			return ['error' => 'Ошибка при загрузке файла'];
		} else {
			return ['result' => '/img/photos/' . $newName . '.' . $extension];
		}
	}
}
