<?php
namespace app\models;

class Product extends \app\core\Model {

	public $product_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $name;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $category;
	public $description;
	public $picture;

	// Setters
	protected function setname($value){
		$this->name = htmlentities($value, ENT_QUOTES);
	}

	protected function setcategory($value){
		$this->category = htmlentities($value, ENT_QUOTES);
	}

	//Select Statements

	public function getAll() {
		$SQL = 'SELECT `product_id`, `name`, `category`, `description`, `picture` FROM product';
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetchAll();
	}

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

	public function getProductDetails($product_id) 
	{
		$SQL = "SELECT * FROM `product` WHERE `product`.`product_id` = :product_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$product_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetch();
	}

	public function getProductByCategory($category_id)
	{
		$SQL = "SELECT `product_id`, `name`, `category`, `description`, `picture` FROM `product` WHERE `category` = :category;";
		$STH = self::$connection->prepare($SQL);
		$data = ['category'=>$category_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetchAll();
	}

	public function getFilteredSum($category_id) {
		$SQL = "SELECT COUNT(product_id) AS num_results FROM product WHERE `category` = :category;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'category'=>$category_id
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetch();
	}

	public function getProductByName($name)
	{
		$SQL = "SELECT `product_id`, `name`, `category`, `description`, `picture` FROM `product` FROM `product` WHERE `name` = :name;";
		$STH = self::$connection->prepare($SQL);
		$data = ['name'=>$name];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetch();
	}

	public function getSearchedSum($name) {
		$SQL = "SELECT COUNT(product_id) AS num_results FROM product WHERE name LIKE :name;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'name'=>"%$name%"
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetch();
	}

	public function search($name) {
		$SQL = "SELECT `product_id`, `name`, `category`, `description`, `picture` FROM product WHERE name LIKE :name;";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'name'=>"%$name%"
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Product');
		return $STH->fetchAll();
	}

	// Create, Edit, Delete

	protected function addProduct() {
		$SQL = "INSERT INTO `product` (`product_id`, `name`, `category`, `description`, `picture`) value (:product_id, :name, :category, :description, :picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$this->product_id,
				'name'=>$this->name,
				'category'=>$this->category,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return self::$connection->lastInsertId();
	}

	protected function editProduct($product_id) {
		$SQL = "UPDATE `product` SET `name`=:name, `category`=:category, `description`=:description, `picture`=:picture WHERE product_id=:product_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$this->product_id,
				'name'=>$this->name,
				'category'=>$this->category,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return $STH->rowCount();		
	}

	public function deleteProduct($product_id){
		$SQL = "DELETE FROM `product` WHERE product_id=:product_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['product_id'=>$product_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

}