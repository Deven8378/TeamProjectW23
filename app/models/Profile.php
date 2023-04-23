<?php
namespace app\models;

class Profile extends \app\core\Model 
{
	public $user_id;
	public $first_name;
	public $middle_name;
	public $last_name;
	public $email;
	public $phone_number;
	public $status;	

	
	public function insert()
	{
		$SQL = 'INSERT INTO profile(user_id, first_name, middle_name, last_name, email, phone_number, status) 
				VALUES (:user_id, :first_name, :middle_name, :last_name, :email, :phone_number, :status)';
		$STH = $this->connection->prepare($SQL);
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

		return $STH->rowCount();
	}

	public function getByEmail($email)
	{
		$SQL = 'SELECT * FROM `profile` WHERE `email` = :email';
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['email'=>$email]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Profile');
		return $STH->fetch();
	}


}