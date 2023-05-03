<?php
namespace app\models;

class Notification extends \app\core\Model{
	public $notify_id;
	public $notify_type;
	public $timestamp;

	public function getNotifications(){
		$SQL = "SELECT * FROM `notification`;";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Message');
		return $STH->fetchAll();
	}

	public function insert(){
		$SQL = "INSERT INTO notification (notify_type) value (:notify_type);";
		$STH = self::$connection->prepare($SQL);
		$data = [
					'notify_type'=>$this->notify_type
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