<?php

namespace app\controllers;

use \app\models\Profile;

#[\app\filters\ProfileCreated]
#[\app\filters\Status]
#[\app\filters\Login]
#[\app\filters\EmployeeAndAdmin]
class Message extends \app\core\Controller
{
	public function index()
	{
		if(isset($_POST['action']))
		{
			if($_POST['message'] != null && $_POST['message'] != "" &&
				$_POST['receiver'] != null && $_POST['receiver'] != "")
			{
				$receiver = $_POST['receiver'] ?? '';
				$profile = new Profile();
				$profile = $profile->getByEmail($receiver);
				$currentProfile = $profile->getByUserId($_SESSION['user_id']);

				if($profile){
					$message = new \app\models\Message();
					$message->receiver = $profile->user_id;
					//setting the FK to a PK value
					$message->sender = $_SESSION['user_id'];
					$message->message = $_POST['message'];
					$message->receiver_full_name = $profile->first_name . ' ' . $profile->middle_name . ' ' . $profile->last_name;
					$message->sender_full_name = $currentProfile->first_name . ' ' . $currentProfile->middle_name . ' ' . $currentProfile->last_name;
					$message->insert();
					header('location:/Message/index#sendMessage?success=Message Sent.');
				} else {
					header('location:/Message/index#sendMessage?error=' . "$receiver is not a valid user. No message sent.");
				}
			} else {
				header('location:/Message/index?error=Please fill the required fields.');
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
		$message = new \app\models\Message();

		$success = $message->delete($message_id, $_SESSION['user_id']);
		if($success){
			header('location:/Message/index?success=Message deleted.');
		} else {
			header('location:/Message/index?error=Could not delete message.');
		}
	}

	public function messageDetails($message_id){
		$messages = new \app\models\Message();
		$message = $messages->getSpecificMessage($message_id);

		if($message){
			$this->view('/Message/messageDetails', $message);
		} else {
			header('location:/Message/index?error=There is no such message.');
		}
	}
}