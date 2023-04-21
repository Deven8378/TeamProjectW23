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
		$SQL = 'SELECT * FROM user WHERE username = :username';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['username'=>$username]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}

	public function getByUserId($user_id)
	{
		$SQL = 'SELECT * FROM user WHERE user_id = :user_id';
		$STH = $this->connection->prepare($SQL);
		$STH->execute(['user_id'=>$user_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\User');
		return $STH->fetch();
	}
	
	public function insert()
	{
		$SQL = 'INSERT INTO user(user_type, username, password_hash) VALUES (:user_type, :username, :password_hash)';
		$STH = $this->connection->prepare($SQL);

		$STH->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash,
						'user_type'=>$this->user_type]);
		return $this->connection->lastInsertId();
	}
}