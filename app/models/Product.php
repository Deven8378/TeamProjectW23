<?php
namespace app\models;

class Product extends \app\core\Model {

	public $name;
	public $description;
	public $picture;
	public $product_id;

	public function addProduct() {
		$SQL = "INSERT INTO product ( name, description,picture) value (:name, :description, :picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['name'=>$this->name,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return self::$connection->lastInsertId();		
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
		$SQL = "UPDATE `product` SET `name`=:name, `description`=:description, `picture`=:picture WHERE product_id=:product_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$this->product_id,
				'name'=>$this->name,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return $STH->rowCount();
	}

}