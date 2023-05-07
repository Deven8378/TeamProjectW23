<?php
namespace app\models;

class Ingredient extends \app\core\Model {

	public $ingredient_id;
	public $name;
	public $category;
	public $description;
	public $picture;

	//Select Statements

	public function getAll() {
		$SQL = 'SELECT `ingredient_id`, `name`, `category`, `description`, `picture` FROM ingredient';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetchAll();
	}

	public function getSum(){
		$SQL = 'SELECT COUNT(ingredient_id) AS num_results FROM ingredient';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function getDaysLeft($ingredient_id){
		$SQL = 'SELECT DATEDIFF(expired_date, arrival_date) AS daysLeft FROM `ingredient` JOIN `ingredient_quantity` ON `ingredient`.`ingredient_id` = `ingredient_quantity`.`ingredient_id` WHERE `ingredient`.ingredient_id=:ingredient_id;';
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['ingredient_id'=>$ingredient_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function getIngredientDetails($ingredient_id) 
	{
		$SQL = "SELECT * FROM `ingredient` WHERE `ingredient`.`ingredient_id` = :ingredient_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$ingredient_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function getIngredientByCategory($category_id)
	{
		$SQL = "SELECT `ingredient_id`, `name`, `category`, `description`, `picture` FROM `ingredient` WHERE `category` = :category;";
		$STH = self::$connection->prepare($SQL);
		$data = ['category'=>$category_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetchAll();
	}

	public function getFilteredSum($category_id) {
		$SQL = "SELECT COUNT(ingredient_id) AS num_results FROM ingredient WHERE `category` = :category;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'category'=>$category_id
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function getIngredientByName($name)
	{
		$SQL = "SELECT `ingredient_id`, `name`, `category`, `description`, `picture` FROM `ingredient` FROM `ingredient` WHERE `name` = :name;";
		$STH = self::$connection->prepare($SQL);
		$data = ['name'=>$name];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function getSearchedSum($name) {
		$SQL = "SELECT COUNT(ingredient_id) AS num_results FROM ingredient WHERE name LIKE :name;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'name'=>"%$name%"
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetch();
	}

	public function search($name) {
		$SQL = "SELECT `ingredient_id`, `name`, `category`, `description`, `picture` FROM ingredient WHERE name LIKE :name;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'name'=>"%$name%"
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Ingredient');
		return $STH->fetchAll();
	}

	// Create, Edit, Delete

	public function addIngredient() {
		$SQL = "INSERT INTO `ingredient` (`ingredient_id`, `name`, `category`, `description`, `picture`) value (:ingredient_id, :name, :category, :description, :picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$this->ingredient_id,
				'name'=>$this->name,
				'category'=>$this->category,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return self::$connection->lastInsertId();
	}

	public function editIngredient($ingredient_id) {
		$SQL = "UPDATE `ingredient` SET `name`=:name, `category`=:category, `description`=:description, `picture`=:picture WHERE ingredient_id=:ingredient_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$this->ingredient_id,
				'name'=>$this->name,
				'category'=>$this->category,
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