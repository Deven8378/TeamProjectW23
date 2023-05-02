<?php

namespace app\controllers;

class Notification extends \app\core\Controller
{
	public function index(){
		$notifications = new \app\models\Notification();
		$notifications = $notifications->getNotifications();
		$this->view('shared/rightSidebar', $notifications);

	}

	public function create()
	{
		if(isset($_POST['action'])){
			$treshold = new \app\models\Treshold();
			$ingredients = new \app\models\Ingredient();
			$ingredients = $ingredients->getIngredientandQuantity();
			$notification = new \app\models\Notification();

			foreach ($ingredients as $ingredient) {
				$expiry_date = $ingredient->expiry_date;
				$treshold = $treshold->getSpecificTreshold($ingredient->category);
				if($ingredient->daysLeft <= $treshold 
					&& $ingredient->daysLeft > 0){
					$notification->notify_type = "expiring";
					$notification->insert();
				} else if($ingredient->quantity <= 10) {
					$notification->notify_type = "lowStock";
					$notification->insert();
				}
			}

			$products = new \app\models\Product();
			$products = $products->getProductandQuantity();
			foreach ($products as $product) {
				$expiry_date = $product->expiry_date;
				$treshold = $treshold->getSpecificTreshold($product->category);

				if($product->daysLeft <= $treshold 
					&& $product->daysLeft > 0){
					$notification->notify_type = "expiring";
					$notification->insert();
				} else if($product->quantity <= 10) {
					$notification->notify_type = "lowStock";
					$notification->insert();
				}
			}
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