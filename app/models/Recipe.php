<?php
namespace app\models;

class Recipe extends \app\core\Model {

	public $recipe_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $title;
	public $description;
	public $picture;

	//Set functions
	protected function settitle($value){
		$this->title = htmlentities($value, ENT_QUOTES);
	}

	//Select Statements

	public function getAll() {
		$SQL = "SELECT title, description, picture, recipe_id FROM recipe";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Recipe');
		return $STH->fetchAll();

	}

	public function get($recipe_id) {
		$SQL = "SELECT * from recipe WHERE recipe_id=:recipe_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['recipe_id'=>$recipe_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS,'app\\models\Recipe');
		return $STH->fetch();

	}

	// Create, Edit, Delete

	protected function insert() {
		$SQL = "INSERT INTO recipe (title, description, picture) value (:title,:description,:picture)";
		$STH = self::$connection->prepare($SQL);
		$data = ['title'=>$this->title,
				'description'=>$this->description,
				'picture'=>$this->picture];
		$STH->execute($data);
		return self::$connection->lastInsertId();		
	}

	protected function update() {
		$SQL = "UPDATE recipe SET title=:title, picture=:picture, description=:description WHERE recipe_id =:recipe_id ";
		$STH = self::$connection->prepare($SQL);
		$data = ['title'=>$this->title,
				'description'=>$this->description,
				'picture'=>$this->picture,
				'recipe_id'=>$this->recipe_id];
		$STH->execute($data);
		return $STH->rowCount();
	}

	public function delete() {
		$SQL = "DELETE FROM recipe WHERE recipe_id=:recipe_id";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['recipe_id'=>$this->recipe_id]);
	}
}