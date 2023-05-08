<?php
namespace app\models;

class Profile extends \app\core\Model 
{
	public $user_id;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $first_name;
	public $middle_name;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]	
	protected $last_name;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]	
	#[\app\validators\ValidEmail]
	protected $email;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]	
	protected $phone_number;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]	
	protected $status;	

	// Setters
	protected function setfirst_name($value){
		$this->first_name = htmlentities($value, ENT_QUOTES);
	}

	protected function setlast_name($value){
		$this->last_name = htmlentities($value, ENT_QUOTES);
	}


	protected function setemail($value){
		$this->email = htmlentities($value, ENT_QUOTES);
	}

	protected function setphone_number($value){
		$this->phone_number = htmlentities($value, ENT_QUOTES);
	}

	protected function setstatus($value){
		$this->status = htmlentities($value, ENT_QUOTES);
	}

	// Select Statements

	public function getByEmail($email)
	{
		$SQL = 'SELECT * FROM `profile` WHERE `email` = :email';
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['email'=>$email]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Profile');
		return $STH->fetch();
	}

	public function getByUserId($user_id)
	{
		$SQL = 'SELECT * FROM `profile` WHERE `user_id` = :user_id';
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['user_id'=>$user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Profile');
		return $STH->fetch();
	}

	public function getProfile($user_id)
	{

		$SQL = "SELECT * FROM profile WHERE user_id=:user_id"; 
		$STH = self::$connection->prepare($SQL);
		$data = [
			'user_id'=>$user_id
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Profile');
		
		return $STH->fetch();
	}

	// Create, Edit, Delete
	
	protected function insert()
	{
		$SQL = 'INSERT INTO profile(user_id, first_name, middle_name, last_name, email, phone_number, status) 
				VALUES (:user_id, :first_name, :middle_name, :last_name, :email, :phone_number, :status)';
		$STH = self::$connection->prepare($SQL);
		$data = [
				'user_id'=>$this->user_id,
				'first_name'=>$this->first_name,
				'middle_name'=>$this->middle_name,
				'last_name'=>$this->last_name,
				'email'=>$this->email,
				'phone_number'=>$this->phone_number,
				'status'=>$this->status
		];

		$STH->execute($data);

		return self::$connection->lastInsertId();
	}

	protected function editProfile($user_id)
	{
		$SQL = "UPDATE profile SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name,email=:email,phone_number=:phone_number,status=:status WHERE user_id=:user_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
				'user_id'=>$user_id,
				'first_name'=>$this->first_name,
				'middle_name'=>$this->middle_name,
				'last_name'=>$this->last_name,
				'email'=>$this->email,
				'phone_number'=>$this->phone_number,
				'status'=>$this->status
		];
		$STH->execute($data);
		return $STH->rowCount();

	}

	public function delete($user_id)
	{
		$SQL = "DELETE FROM profile WHERE user_id=:user_id";
		$STH = self::$connection->prepare($SQL);
		$data = [
			'user_id'=>$user_id
		];
		$STH->execute($data);
		return $STH->rowCount();
	}


}