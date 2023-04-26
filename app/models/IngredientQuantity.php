<?php
namespace app\models;

class IngredientQuantity extends \app\core\Model {

	public $iq_id;
	public $ingredient_id;
	public $arrival_date;
	public $expired_date;
	public $quantity;
	public $price;

	public function getAll() {
		$SQL = 'SELECT * FROM ingredient_quantity WHERE ingredient_id=:ingredient_id';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\IngredientQuantity');
		return $STH->fetch();
	}

	public function addIngredientQuantity() {
		$SQL = "INSERT INTO `ingredient_quantity` (`iq_id`, `ingredient_id`, `arrival_date`, `expired_date`, `quantity`, `price`) value (:iq_id, :ingredient_id, :arrival_date, :expired_date, :quantity, :price)";
		$STH = self::$connection->prepare($SQL);
		$data = ['iq_id'=>$this->iq_id,
				'ingredient_id'=>$this->ingredient_id,
				'arrival_date'=>$this->arrival_date,
				'expired_date'=>$this->expired_date,
				'quantity'=>$this->quantity,
				'price'=>$this->price];
		$STH->execute($data);
		return self::$connection->lastInsertId();
	}

	public function editIngredientQuantity($iq_id, $ingredient_id) {
		$SQL = "UPDATE `ingredient` SET `arrival_date`=:arrival_date, `expired_date`=:expired_date, `quantity`=:quantity, , `price`=:price WHERE ingredient_id=:ingredient_id AND iq_id=:iq_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['iq_id'=>$this->iq_id,
				'ingredient_id'=>$this->ingredient_id,
				'arrival_date'=>$this->arrival_date,
				'expired_date'=>$this->expired_date,
				'quantity'=>$this->quantity,
				'price'=>$this->price];
		$STH->execute($data);
		return $STH->rowCount();		
	}

	public function deleteIngredient($iq_id){
		$SQL = "DELETE FROM `ingredient_quantity` WHERE iq_id=:iq_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['iq_id'=>$iq_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}
}