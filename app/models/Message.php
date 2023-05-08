<?php
namespace app\models;

class Message extends \app\core\Model{
	public $message_id;
	public $sender;
	public $receiver;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $message;
	public $timestamp;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $receiver_full_name;
	#[\app\validators\NonNull]
	#[\app\validators\NonEmpty]
	protected $sender_full_name;

	// Setters
	protected function setmessage($value){
		$this->message = htmlentities($value, ENT_QUOTES);
	}	

	protected function setreceiver_full_name($value){
		$this->receiver_full_name = htmlentities($value, ENT_QUOTES);
	}
	
	protected function setsender_full_name($value){
		$this->sender_full_name = htmlentities($value, ENT_QUOTES);
	}	

	// Create, Delete

	protected function insert(){
		$SQL = "INSERT INTO message (sender, receiver, message, receiver_full_name, sender_full_name) value (:sender, :receiver, :message, :receiver_full_name, :sender_full_name)";
		$STH = self::$connection->prepare($SQL);
		$data = ['sender'=>$this->sender,
					'receiver'=>$this->receiver,
					'message'=>$this->message,
					'receiver_full_name'=>$this->receiver_full_name,
					'sender_full_name'=>$this->sender_full_name
				];
		$STH->execute($data);
		$this->message_id = self::$connection->lastInsertId();
	}

	public function delete($message_id, $user_id){
		$SQL = "DELETE FROM message WHERE message_id=:message_id AND receiver=:receiver";
		$STH = self::$connection->prepare($SQL);
		$data = ['message_id'=>$message_id, 'receiver'=>$user_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

	// Select Statements

	public function getInbox($user_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`receiver_full_name` , `message`.`sender_full_name`, `message`.`message`, `message`.`timestamp`, `profile`.`first_name`, `profile`.`last_name`  FROM `message` INNER JOIN `profile` ON `profile`.`user_id` = `message`.`sender` WHERE receiver=:receiver;";
		$STH = self::$connection->prepare($SQL);
		$data = ['receiver'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

	public function getSent($user_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`receiver_full_name` , `message`.`sender_full_name`, `message`.`message`, `message`.`timestamp` FROM `message` WHERE sender=:sender;";
		$STH = self::$connection->prepare($SQL);
		$data = ['sender'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

	public function getSpecificMessage($message_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`receiver`, `message`.`receiver_full_name` , `message`.`sender_full_name`, `message`.`message`, `message`.`timestamp` FROM `message` WHERE message_id=:message_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['message_id'=>$message_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetch();
	}
}