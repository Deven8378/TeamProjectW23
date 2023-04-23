<?php
namespace app\models;

class Message extends \app\core\Model{
	public $message_id;
	public $sender;
	public $receiver;
	public $message;
	public $timestamp;

	public function insert(){
		$SQL = "INSERT INTO message (sender, receiver, message) value (:sender, :receiver, :message)";
		$STH = $this->connection->prepare($SQL);
		$data = ['sender'=>$this->sender,
					'receiver'=>$this->receiver,
					'message'=>$this->message];
		$STH->execute($data);
		$this->message_id = $this->connection->lastInsertId();
	}


	public function delete($message_id, $user_id){
		//only the owner of the message can delete it
		$SQL = "DELETE FROM message WHERE message_id=:message_id AND receiver=:receiver";
		$STH = $this->connection->prepare($SQL);
		$data = ['message_id'=>$message_id, 'receiver'=>$user_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

	public function getInbox($user_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`message`, `message`.`timestamp`, sendertable.`email` AS `sender_email`, sendertable.`first_name` AS `sender_fname`, sendertable.`last_name` AS `sender_lname` FROM `message` JOIN `profile` AS `sendertable` ON `message`.`sender` = sendertable.`user_id` WHERE receiver=:receiver;";
		$STH = $this->connection->prepare($SQL);
		$data = ['receiver'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

	public function getSent($user_id){
		$SQL = "SELECT `message`.`message_id`, `message`.`message`, `message`.`timestamp`, sendertable.`email` AS `sender_email`, sendertable.`first_name` AS `sender_fname`, sendertable.`last_name` AS `sender_lname` FROM `message` JOIN `profile` AS `sendertable` ON `message`.`sender` = sendertable.`user_id` WHERE sender=:sender;";
		$STH = $this->connection->prepare($SQL);
		$data = ['sender'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}
}