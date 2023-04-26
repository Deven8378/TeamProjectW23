<?php
namespace app\models;

class Ingredient extends \app\core\Model {

	public $ingredient_id;
	public $name;
	public $description;
	public $price;
	public $picture;

	public function getAll() {
		$SQL = 'SELECT * FROM ingredient';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetchAll();
	}

	public function getIngredientDetails($ingredient_id) 
	{
		$SQL = "SELECT * FROM `ingredient` WHERE `ingredient_id` = :ingredient_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$ingredient_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function addIngredient() {
		$SQL = "INSERT INTO `ingredient` (`ingredient_id`, `name`, `description`, `picture`) value (:ingredient_id, :name, :description, :picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$this->ingredient_id,
				'name'=>$this->name,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return self::$connection->lastInsertId();
	}

	public function editIngredient($ingredient_id) {
		$SQL = "UPDATE `ingredient` SET `name`=:name, `description`=:description, `picture`=:picture WHERE ingredient_id=:ingredient_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$this->ingredient_id,
				'name'=>$this->name,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return $STH->rowCount();		
	}

	public function deleteIngredient($ingredient_id){
		$SQL = "DELETE FROM `ingredient` WHERE ingredient_id=:ingredient_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$ingredient_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}
}