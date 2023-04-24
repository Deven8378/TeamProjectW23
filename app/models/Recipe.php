<?php
namespace app\models;

class Recipe extends \app\core\Model {

	public $id;
	public $title;
	public $description;
	public $picture;

	public function getAll() {
		$SQL = 'SELECT * FROM recipe';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Recipe');
		return $STH->fetchAll();

	}

	public function insert() {
		$SQL = "INSERT INTO recipe (title, description, picture) value (:title,:description,:picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['title'=>$this->title,
				'description'=>$this->description,
				'picture'=>$this->picure];
		$STH->execute($data);
		return self::$connection->lastInsertId();		
	}

}