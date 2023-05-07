<?php
namespace app\controllers;


#[\app\filters\ProfileCreated]
#[\app\filters\Status]
#[\app\filters\Login]
class Recipe extends \app\core\Controller {

	#[\app\filters\EmployeeAndAdmin]
	public function index() {

		$recipe = new \app\models\Recipe();
		$recipes = $recipe->getAll();
		$this->view('Recipe/index',$recipes);
	}

	#[\app\filters\Admin]
	public function create() {

		if (isset($_POST['action'])) {
			if (!empty($_POST['title']) && !empty($_POST['description']) && !ctype_space($_POST['description']) && !ctype_space($_POST['title'])) {
			$recipe = new \app\models\Recipe();
			$recipe->title = htmlentities($_POST['title']);
			$recipe->description = htmlentities($_POST['description']);
			$picture = $this->saveProduct($_FILES['recipePicture']);

			if ($picture) {
				$recipe->picture = $picture;
				$recipe->insert();
				header('location:/Recipe/index?success=Recipe Added');
			} else
				header('location:/Recipe/create?error=Invalid or missing picture');
		} else
			header('location:/Recipe/create?error=Please fill in the form');

			
		} else 
			$this->view('Recipe/create');
		
	}

	#[\app\filters\EmployeeAndAdmin]
	public function details($recipe_id) {
		$recipe = new \app\models\Recipe();
		$recipe = $recipe->get($recipe_id);
		$this->view('Recipe/details',$recipe);
	}

	#[\app\filters\Admin]
	public function edit($recipe_id) {

		$recipe = new \app\models\Recipe();
		$recipe = $recipe->get($recipe_id);
		if (isset($_POST['action'])) {
			if (!empty($_POST['title']) && !empty($_POST['description']) && !ctype_space($_POST['description']) && !ctype_space($_POST['title'])) {
			$recipe->title = htmlentities($_POST['title']);
			$recipe->description = htmlentities($_POST['description']);
			$picture = $this->saveProduct($_FILES['recipePicture']);

			if ($picture) {
				$recipe->picture = $picture;
			}
			$recipe->update();
			header('location:/Recipe/details/' . $recipe_id);
			}
			else 
				header('location:/Recipe/edit/' . $recipe_id. '?error=Please fill in the form');
		}
		else 
			$this->view('Recipe/edit',$recipe);
		
	}

	#[\app\filters\Admin]
	public function delete($recipe_id) {
		$recipe = new \app\models\Recipe();
		$recipe = $recipe->get($recipe_id);
		$recipe->delete();
		header('location:/Recipe/index');
	}
}