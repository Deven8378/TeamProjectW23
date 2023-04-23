<?php

namespace app\controllers;

class Message extends \app\core\Controller
{

	public function index()
	{
		if(isset($_POST['action']))
		{
			$receiver = $_POST['receiver'] ?? '';
			$profile = new \app\models\profile();
			$profile = $profile->getByEmail($receiver);

			if($profile){
				$message = new \app\models\Message();
				$message->receiver = $profile->user_id;
				//setting the FK to a PK value
				$message->sender = $_SESSION['user_id'];
				$message->message = $_POST['message'];
				$message->insert();
				header('location:/Message/index?success=Message Sent.');
			} else {
				header('location:/Message/index?error=' . "$receiver is not a valid user. No message sent.");
			}
		} else {
			$message = new \app\models\Message();
			$inbox = $message->getInbox($_SESSION['user_id']);
			$sent = $message->getSent($_SESSION['user_id']);
			$this->view('/Message/index', [$inbox, $sent]);
		}
	}

	public function delete($message_id)
	{
		$user_id = $_SESSION['user_id'];
		$message = new \app\models\Message();
		$success = $message->delete($message_id, $user_id);
		if($success){
			header('location:/User/profile?success=Message deleted.');
		} else {
			header('location:/User/profile?error=Not accessible.');
		}
	}
}