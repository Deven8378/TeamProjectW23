<?php
namespace app\models;

class User extends \app\core\Model 
{
	public $user_id;
	public $username;
	public $password_hash;
	public $user_type;	

	public function getByUsername($username)
	{
		$SQL = 'SELECT * FROM user 
				WHERE username = :username';
		
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}

	public function getByUserId($user_id)
	{
		$SQL = 'SELECT * FROM user 
				WHERE user_id = :user_id';
		
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['user_id'=>$user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}
	
	public function insert()
	{
		$SQL = 'INSERT INTO user(user_type, username, password_hash) 
				VALUES (:user_type, :username, :password_hash)';
		
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash,
						'user_type'=>$this->user_type]);
		return $this->connection->lastInsertId();
	}

	public function getAllUserInfo()
	{

		// $SQL = "SELECT * FROM user WHERE user_type IN ('admin','employee')"; //KEEP THIS HERE FOR DEBUGGING SOME 
		// $SQL = "SELECT * FROM user 
		// 		JOIN profile ON user.user_id = profile.user_id 
		// 		WHERE user.user_type IN ('admin', 'employee')";
		
		$SQL = "SELECT p.status, u.user_id, u.username, p.first_name, p.middle_name, p.last_name, p.email, p.phone_number
			FROM user u
			LEFT JOIN profile p ON u.user_id = p.user_id
			WHERE u.user_type <> 'itspecialist'";

		$STH = $this->connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		
		return $STH->fetchAll();
	}

	public function getUserInfo($user_id)
	{
		
		$SQL = "SELECT p.status, u.user_id, u.username, p.first_name, p.middle_name, p.last_name, p.email, p.phone_number
			FROM user u
			LEFT JOIN profile p ON u.user_id = p.user_id
			WHERE u.user_id=:user_id";

		$STH = $this->connection->prepare($SQL);
		$data = [
			'user_id'=>$user_id
		];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}



}
