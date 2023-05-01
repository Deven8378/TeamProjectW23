<?php
namespace app\models;

class Notification extends \app\core\Model{
	public $notify_id;
	public $notify_type;
	public $message;
	public $timestamp;
	public $treshold;

	public function getNotifications(){
		$SQL = "SELECT * FROM `notification`;";
		$STH = self::$connection->prepare($SQL);
		$data = ['receiver'=>$user_id];
		$STH->execute($data);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO notification (notify_id, notify_type, message, `timestamp`, treshold) value (:notify_id, :notify_type, :message, :timestamp, :treshold);";
		$STH = self::$connection->prepare($SQL);
		$data = ['notify_id'=>$this->notidy_id,
					'notify_type'=>$this->notify_type,
					'message'=>$this->message,
					'timestamp'=>$this->timestamp,
					'treshold'=>$this->treshold
				];
		$STH->execute($data);
		$this->message_id = self::$connection->lastInsertId();
	}


	public function delete($notify_id){
		$SQL = "DELETE FROM notification WHERE notify_id=:notify_id;";
		$STH = self::$connection->prepare($SQL);
		$data = ['notify_id'=>$notify_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}
}