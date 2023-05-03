<?php

// namespace app\controllers;

// class Notification extends \app\core\Controller
// {
	// public function index(){
	// 	$notifications = new \app\models\Notification();
	// 	$treshold = new \app\models\Treshold();
		
	// 	if(isset($_POST['action'])){
	// 		$ingredients = new \app\models\Ingredient();
	// 		$ingredients = $ingredients->getAllIngredientandQuantity();

	// 		foreach ($ingredients as $ingredient) {
	// 			$expiry_date = $ingredient->expiry_date;
	// 			$treshold = $treshold->getSpecificTreshold($ingredient->category);
	// 			if($ingredient->daysLeft <= $treshold->treshold 
	// 				&& $ingredient->daysLeft > 0){
	// 				$notifications->notify_type = "expiring";
	// 				$notifications->insert();
	// 				header('location:/Notification/index');
	// 			}
	// 			if($ingredient->quantity <= 10) {
	// 				$notifications->notify_type = "lowStock";
	// 				$notifications->insert();
	// 				header('location:/Notification/index');
	// 			}
	// 			if($product->daysLeft <= 0){
	// 				$notifications->notify_type = "expiring";
	// 				$notifications->insert();
	// 			}
	// 		}

	// 		$products = new \app\models\Product();
	// 		$products = $products->getProductandQuantity();
	// 		foreach ($products as $product) {
	// 			$expiry_date = $product->expiry_date;
	// 			$treshold = $treshold->getSpecificTreshold($product->category);

	// 			if($product->daysLeft <= $treshold->treshold
	// 				&& $product->daysLeft > 0){
	// 				$notifications->notify_type = "expiring";
	// 				$notifications->insert();
	// 			}
	// 			if($product->quantity <= 10) {
	// 				$notifications->notify_type = "lowStock";
	// 				$notifications->insert();
	// 			}
	// 			if($product->daysLeft <= 0){
	// 				$notifications->notify_type = "expiring";
	// 				$notifications->insert();
	// 			}
	// 		}
	// 	} else {
	// 		$notifications = $notifications->getNotifications();
	// 		$this->view('Notification/index', $notifications);
	// 	}
	// }
// }