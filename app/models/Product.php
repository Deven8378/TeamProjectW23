<?php
namespace app\models;

class Product extends \app\core\Model {

	public $name;
	public $description;
	public $picture;
	public $price;
	public $product_id;

	public function addProduct() {
		$SQL = "INSERT INTO product ( name, description, price, picture) value (:name, :description, :price, :picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['name'=>$this->name,
				'description'=>$this->description,
				'price'=>$this->price,
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

}