<?php
namespace app\models;

class Treshold extends \app\core\Model{
	public $treshold_id;
	public $treshold_category;

	public function getTresholds(){
		$SQL = "SELECT `treshold`.`treshold_id`, `treshold`.`treshold_category` FROM `treshold`;";
		$STH = self::$connection->prepare($SQL);
		$STH->execute();
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Treshold');
		return $STH->fetchAll();
	}

	public function getSpecificTreshold(){
		$SQL = "SELECT `treshold`.`treshold_id`, `treshold`.`treshold_category` FROM `treshold` WHERE 'treshold_id'=:treshold_id;";
		$STH = self::$connection->prepare($SQL);
		$STH->execute(['treshold_id'=>$treshold_id]);
		$STH->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Treshold');
		return $STH->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO treshold (treshold_id, treshold_category) value (:treshold_id, :treshold_category)";
		$STH = self::$connection->prepare($SQL);
		$data = ['treshold_id'=>$this->treshold_id,
				'treshold_category'=>$this->treshold_category,
				];
		$STH->execute($data);
		$this->message_id = self::$connection->lastInsertId();
	}

	public function update($treshold_id){
		//only the owner of the message can delete it
		$SQL = "UPDATE `treshold` SET treshold_category=:treshold_category";
		$STH = self::$connection->prepare($SQL);
		$data = ['treshold_category'=>$treshold_category];
		$STH->execute($data);
		return $STH->rowCount(); 
	}

	public function delete($treshold_id){
		//only the owner of the message can delete it
		$SQL = "DELETE FROM treshold WHERE treshold_id=:treshold_id";
		$STH = self::$connection->prepare($SQL);
		$data = ['treshold_id'=>$treshold_id];
		$STH->execute($data);
		return $STH->rowCount(); 
	}
}