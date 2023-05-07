<?php
namespace app\models;

class IngredientQuantity extends \app\core\Model {

	public $iq_id;
	public $ingredient_id;
	public $arrival_date;
	public $expired_date;
	public $quantity;
	public $price;

	// Select Statements

	public function getAll($ingredient_id) {
		$SQL = 'SELECT `iq_id`, `ingredient_id`, `arrival_date`, `expired_date`, `quantity`, `price`, DATEDIFF(expired_date, arrival_date) AS daysLeft FROM ingredient_quantity WHERE ingredient_id=:ingredient_id';
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$ingredient_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\IngredientQuantity');
		return $STH->fetchAll();
	}

	public function getTotalQuantity($ingredient_id){
		$SQL = "SELECT SUM(quantity) AS `fullQuantity` FROM `ingredient_quantity` WHERE `ingredient_id` = :ingredient_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$ingredient_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\IngredientQuantity');
		return $STH->fetch();
	}

	public function getOneQuantity($iq_id) {
		$SQL = 'SELECT `iq_id`, `ingredient_id`, `arrival_date`, `expired_date`, `quantity`, `price` FROM ingredient_quantity WHERE iq_id=:iq_id';
		$STH = self::$connection->prepare($SQL);
		$data = [
				'iq_id'=>$iq_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\IngredientQuantity');
		return $STH->fetch();
	}

	public function getAvailibility() {
		$SQL = 'SELECT iq_id, quantity, DATEDIFF(expired_date, arrival_date) AS daysLeft FROM ingredient_quantity;';
		$STH = self::$connection->prepare($SQL);
		$data = ['ingredient_id'=>$ingredient_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\IngredientQuantity');
		return $STH->fetchAll();
	}

	// Create, Edit, Delete

	public function addIngredientQuantity($ingredient_id) {
		$SQL = "INSERT INTO `ingredient_quantity` (`iq_id`, `ingredient_id`, `arrival_date`, `expired_date`, `quantity`, `price`) value (:iq_id, :ingredient_id, :arrival_date, :expired_date, :quantity, :price)";
		$STH = self::$connection->prepare($SQL);
		$data = ['iq_id'=>$this->iq_id,
				'ingredient_id'=>$ingredient_id,
				'arrival_date'=>$this->arrival_date,
				'expired_date'=>$this->expired_date,
				'quantity'=>$this->quantity,
				'price'=>$this->price];
		$STH->execute($data);
		return self::$connection->lastInsertId();
	}

	public function editQuantity($iq_id) {
		$SQL = "UPDATE `ingredient_quantity` SET `arrival_date`=:arrival_date, `expired_date`=:expired_date, `quantity`=:quantity, `price`=:price WHERE iq_id=:iq_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['iq_id'=>$iq_id,
				'arrival_date'=>$this->arrival_date,
				'expired_date'=>$this->expired_date,
				'quantity'=>$this->quantity,
				'price'=>$this->price];
		$STH->execute($data);
		return $STH->rowCount();		
	}

	public function deleteQuantity($iq_id){
		$SQL = "DELETE FROM `ingredient_quantity` WHERE iq_id=:iq_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['iq_id'=>$iq_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}
}