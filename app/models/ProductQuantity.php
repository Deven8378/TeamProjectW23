<?php
namespace app\models;

class ProductQuantity extends \app\core\Model {

	public $pq_id;
	public $product_id;
	public $produced_date;
	public $expired_date;
	public $quantity;
	public $price;

	//Select Statements

	public function getAll($product_id) {
		$SQL = 'SELECT `pq_id`, `product_id`, `produced_date`, `expired_date`, `quantity`, `price`, DATEDIFF(expired_date, produced_date) AS daysLeft FROM product_quantity WHERE product_id=:product_id';
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$product_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\ProductQuantity');
		return $STH->fetchAll();
	}

	public function getTotalQuantity($product_id){
		$SQL = "SELECT SUM(quantity) AS `fullQuantity` FROM `product_quantity` WHERE `product_id` = :product_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$product_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\ProductQuantity');
		return $STH->fetch();
	}

	public function getOneQuantity($pq_id) {
		$SQL = 'SELECT * FROM product_quantity WHERE pq_id=:pq_id';
		$STH = self::$connection->prepare($SQL);
		$data = ['pq_id'=>$pq_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\ProductQuantity');
		return $STH->fetch();
	}

	// Create, Edit, Delete

	public function addProductQuantity($product_id) {
		$SQL = "INSERT INTO `product_quantity` (`pq_id`, `product_id`, `produced_date`, `expired_date`, `quantity`, `price`) value (:pq_id, :product_id, :produced_date, :expired_date, :quantity, :price)";
		$STH = self::$connection->prepare($SQL);
		$data = ['pq_id'=>$this->pq_id,
				'product_id'=>$product_id,
				'produced_date'=>$this->produced_date,
				'expired_date'=>$this->expired_date,
				'quantity'=>$this->quantity,
				'price'=>$this->price];
		$STH->execute($data);
		return self::$connection->lastInsertId();
	}

	public function editQuantity($pq_id) {
		$SQL = "UPDATE `product_quantity` SET `produced_date`=:produced_date, `expired_date`=:expired_date, `quantity`=:quantity, `price`=:price WHERE pq_id=:pq_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['pq_id'=>$pq_id,
				'produced_date'=>$this->produced_date,
				'expired_date'=>$this->expired_date,
				'quantity'=>$this->quantity,
				'price'=>$this->price];
		$STH->execute($data);
		return $STH->rowCount();		
	}

	public function deleteQuantity($pq_id){
		$SQL = "DELETE FROM `product_quantity` WHERE pq_id=:pq_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['pq_id'=>$pq_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

		public function getAvailibility() {
		$SQL = 'SELECT pq_id, quantity, DATEDIFF(expired_date, produced_date) AS daysLeft FROM product_quantity;';
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$product_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\productQuantity');
		return $STH->fetchAll();
	}

		public function quantityUpdate($pq_id) {
		$SQL = "UPDATE `product_quantity` SET `quantity`=:quantity WHERE pq_id=:pq_id;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'pq_id'=>$pq_id,
			'quantity'=>$this->quantity
		];
		$STH->execute($data);
		return $STH->rowCount();		
	}

}