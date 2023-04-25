<?php
namespace app\models;

class Recipe extends \app\core\Model {

	public $id;
	public $title;
	public $description;
	public $picture;

	public function getAll() {
		$SQL = "SELECT title, description, picture, recipe_id FROM recipe";
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
				'picture'=>$this->picture];
		$STH->execute($data);
		return self::$connection->lastInsertId();		
	}

}