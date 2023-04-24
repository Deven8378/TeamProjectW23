<?php
namespace app\controllers;

class Recipe extends \app\core\Controller {

	public function index() {

		$recipes = new \app\models\Recipe();
		$recipes->getAll();
		$this->view('Recipe/index',$recipes);
	}

	public function create() {

		if (isset($_POST['action'])) {
			$recipe = new \app\models\Recipe();
			$recipe->title = $_POST['title'];
			$recipe->description = $_POST['description'];
			$picture = $this->saveProduct($_FILES['recipePicture']);

			if ($picture) {
				$recipe->picture = $picture;
				$recipe->insert();
				header('location:/Recipe/index?picture=Recipe Added');
			}
			
		} else 
		$this->view('Recipe/create');
	}

	 

}