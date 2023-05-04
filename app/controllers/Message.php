<?php

namespace app\controllers;

use \app\models\Profile;
use \app\models\Message;

class Message extends \app\core\Controller
{
	#[\app\filters\EmployeeAndAdmin]
	public function index()
	{
		if(isset($_POST['action']))
		{
			$receiver = $_POST['receiver'] ?? '';
			$profile = new Profile();
			$profile = $profile->getByEmail($receiver);

			if($profile){
				$message = new Message();
				$message->receiver = $profile->user_id;
				//setting the FK to a PK value
				$message->sender = $_SESSION['user_id'];
				$message->message = $_POST['message'];
				$message->full_name = $profile->first_name . ' ' . $profile->middle_name . ' ' . $profile->last_name;
				$message->insert();
				header('location:/Message/index?success=Message Sent.');
			} else {
				header('location:/Message/index?error=' . "$receiver is not a valid user. No message sent.");
			}
		} else {
			$message = new Message();
			$inbox = $message->getInbox($_SESSION['user_id']);
			$sent = $message->getSent($_SESSION['user_id']);
			$this->view('/Message/index', [$inbox, $sent]);
		}
	}

	#[\app\filters\EmployeeAndAdmin]
	public function delete($message_id)
	{
		$message = new Message();

		$success = $message->delete($message_id, $_SESSION['user_id']);
		if($success){
			header('location:/Message/index?success=Message deleted.');
		} else {
			header('location:/Message/index?error=Could not delete message.');
		}
	}
}