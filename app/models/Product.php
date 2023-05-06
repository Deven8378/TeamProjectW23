<?php
namespace app\models;

class Product extends \app\core\Model {

	public $name;
	public $description;
	public $picture;
	public $product_id;
	public $category;

	public function getSum(){
		$SQL = 'SELECT COUNT(product_id) AS num_results FROM product';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetch();
	}

	public function getDaysLeft($product_id){
		$SQL = 'SELECT DATEDIFF(expired_date, arrival_date) AS daysLeft FROM `product` JOIN `product_quantity` ON `product`.`product_id` = `product_quantity`.`product_id` WHERE `product`.product_id=:product_id;';
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['product_id'=>$product_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetch();
	}

	public function getProductByCategory($category_id)
	{
		$SQL = "SELECT * FROM `product` WHERE `category` = :category;";
		$STH = self::$connection->prepare($SQL);
		$data = ['category'=>$category_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetchAll();
	}

	public function search($name) {
		$SQL = "SELECT * FROM product WHERE name LIKE :name;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'name'=>"%$name%"
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetchAll();
	}

	public function addProduct() {
		$SQL = "INSERT INTO product ( name, description, picture, category) value (:name, :description, :picture, :category)";
		$STH = self::$connection->prepare($SQL);
		$data = ['name'=>$this->name,
				'description'=>$this->description,
				'picture'=>$this->picture,
				'category'=>$this->category];
		$STH->execute($data);
		return self::$connection->lastInsertId();		
	}

	public function getProductandQuantity(){
		$SQL = 'SELECT *, DATEDIFF(expired_date, arrival_date) AS daysLeft FROM `product` JOIN `product_quantity` ON `product`.`product_id` = `product_quantity`.`product_id`;';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetchAll();
	}

	public function getAll() {
		$SQL = 'SELECT * FROM product';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\product');
		return $STH->fetchAll();

	}

	public function getProductDetails($product_id) 
	{
		$SQL = "SELECT * FROM product WHERE product_id = :product_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$product_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\product');
		return $STH->fetch();
	}

	public function delete() {
		$SQL = "DELETE  from product WHERE product_id=:product_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['product_id'=>$this->product_id]);
	}

	public function edit() {
		$SQL = "UPDATE `product` SET `name`=:name, `description`=:description, `picture`=:picture, `category`=:category WHERE product_id=:product_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$this->product_id,
				'name'=>$this->name,
				'description'=>$this->description,
				'picture'=>$this->picture,
				'category'=>$this->category];
		$STH->execute($data);
		return $STH->rowCount();
	}

}