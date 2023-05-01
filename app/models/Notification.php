<?php
namespace app\models;

class Notification extends \app\core\Model{
	public $message_id;
	public $sender;
	public $receiver;
	public $message;
	public $timestamp;
	public $full_name;

	public function insert(){
		$SQL = "INSERT INTO message (full_name, sender, receiver, message) value (:full_name, :sender, :receiver, :message)";
		$STH = self::$connection->prepare($SQL);
		$data = ['sender'=>$this->sender,
					'receiver'=>$this->receiver,
					'message'=>$this->message,
					'full_name'=>$this->full_name
				];
		$STH->execute($data);
		$this->message_id = self::$connection->lastInsertId();
	}


	public function delete($message_id, $user_id){
		//only the owner of the message can delete it
		$SQL = "DELETE FROM message WHERE message_id=:message_id AND receiver=:receiver";
		$STH = self::$connection->prepare($SQL);
		$data = ['message_id'=>$message_id, 'receiver'=>$user_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

	public function getInbox($user_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`full_name` ,`message`.`message`, `message`.`timestamp` FROM `message` WHERE receiver=:receiver;";
		$STH = self::$connection->prepare($SQL);
		$data = ['receiver'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

	public function getSent($user_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`full_name` ,`message`.`message`, `message`.`timestamp` FROM `message` WHERE sender=:sender;";
		$STH = self::$connection->prepare($SQL);
		$data = ['sender'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}
}