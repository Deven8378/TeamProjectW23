<?php

namespace app\controllers;

class Notification extends \app\core\Controller
{
	#[\app\filters\EmployeeAndAdmin]
	public function index()
	{
		$treshold_fruits = 3;
		$treshold_dairy = 12;
		$treshold_sweets = 50;
		$treshold_fat = 30;
		$treshold_baking = 30;
		$treshold_others = 20;

		$ingredients = new \app\models\Ingredient();
		$ingredients = $ingredients->getIngredientandQuantity();

		foreach ($ingredients as $ingredient) {
			$expiry_date = $ingredient->expiry_date;


		}
	}

	#[\app\filters\EmployeeAndAdmin]
	public function delete($message_id)
	{
		$message = new \app\models\Notification();
		$success = $message->delete($notify_id);
		if($success){
			header('location:/Message/index?success=Message deleted.');
		} else {
			header('location:/Message/index?error=Could not delete message.');
		}
	}
}