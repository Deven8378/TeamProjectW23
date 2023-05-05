<?php
namespace app\models;

class Category extends \app\core\Model{
	public $category_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	public $category_name;
	public $timestamp;

	public function getCategories(){
		$SQL = "SELECT `category`.`category_id`, `category`.`category_name` FROM `category` ORDER BY timestamp DESC;";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Category');
		return $STH->fetchAll();
	}

	public function getSpecificcategory($category_id){
		$SQL = "SELECT * FROM `category` WHERE category_id=:category_id;";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['category_id'=>$category_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Category');
		return $STH->fetch();
	}

	public function insert()
	{
		$SQL = 'INSERT INTO category(category_name) 
				VALUES (:category_name)';
		
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['category_name'=>$this->category_name,]);
		return self::$connection->lastInsertId();
	}

	public function update($category_id){
		//only the owner of the message can delete it
		$SQL = "UPDATE `category` SET category_name=:category_name WHERE category_id=:category_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'category_name'=>$this->category_name,
			'category_id'=>$category_id,
		];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

	public function delete($category_id){
		//only the owner of the message can delete it
		$SQL = "DELETE FROM category WHERE category_id=:category_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['category_id'=>$category_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}
}