<?php
namespace app\controllers;

class Recipe extends \app\core\Controller {

	#[\app\filters\EmployeeAndAdmin]
	public function index() {

		$recipe = new \app\models\Recipe();
		$recipes = $recipe->getAll();
		$this->view('Recipe/index',$recipes);
	}

	#[\app\filters\EmployeeAndAdmin]
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

	#[\app\filters\EmployeeAndAdmin]
	public function details($recipe_id) {
		$recipe = new \app\models\Recipe();
		$recipe = $recipe->get($recipe_id);
		$this->view('Recipe/details',$recipe);
	}

	#[\app\filters\EmployeeAndAdmin]
	public function edit($recipe_id) {
		$recipe = new \app\models\Recipe();
		$recipe = $recipe->get($recipe_id);
		if (isset($_POST['action'])) {
			$recipe->title = $_POST['title'];
			$recipe->description = $_POST['description'];
			$picture = $this->saveProduct($_FILES['recipePicture']);

			if ($picture) {
				$recipe->picture = $picture;
			}
			$recipe->update();
			header('location:/Recipe/details/' . $recipe_id);
		}
		else {
			$this->view('Recipe/edit',$recipe);
		}
	}

	#[\app\filters\EmployeeAndAdmin]
	public function delete($recipe_id) {
		$recipe = new \app\models\Recipe();
		$recipe = $recipe->get($recipe_id);
		$recipe->delete();
		unlink("productImages/$recipe->picture");
		header('location:/Recipe/index');
	}
}