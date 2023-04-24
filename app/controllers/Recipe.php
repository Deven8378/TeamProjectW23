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
			$picture = $this->uploadPicture($_SESSION['user_id']);

			if (isset($picture['target_file'])) {
				$recipe->picture = $picture['target_file'];

			 $uploadMessage = $picture["upload_message"] == 'success' ? '' : '&error=Something went wrong '.$uploadedPicture["upload_message"];

            $success = $recipe->insert();

            if($success) {
                header('location:/Recipe/index?success=Recipe Added!'.$uploadMessage);
            }
            else {
                header('location:/Recipe/index?error=Something went wrong. '.$uploadMessage);
            }
       }

			
		} else 
		$this->view('Recipe/create');
	}

	 public function uploadPicture($user_id){

        $uploadedFile = array();

        if(isset($_FILES["recipePicture"]) && ($_FILES["recipePicture"]["error"] == UPLOAD_ERR_OK)){

            $info = getimagesize($_FILES["recipePicture"]["tmp_name"]);

            $allowedTypes = ["jpg", "png", "gif"];

            $fileName = basename($_FILES["recipePicture"]["name"]);

            $fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

            if($info == false){

                $uploadedFile["upload_message"] = "Bad image file format!";
                $uploadedFile["target_file"] = null;

            }else if(!in_array($fileType, $allowedTypes)){//File uploaded, but check the image file type

                $uploadedFile["upload_message"] = "The image file type is not accepted!";
                $uploadedFile["target_file"] = null;

            }else{
                // Save the image in the images folder of htdocs
                $path = 'images'.DIRECTORY_SEPARATOR;
                $targetFileName = $user_id.'-'.uniqid().'.'.$fileType;

                move_uploaded_file($_FILES["recipePicture"]["tmp_name"], $path.$targetFileName);

                $uploadedFile["upload_message"] = "success";

                $uploadedFile["target_file"] = $targetFileName;

                return  $uploadedFile;

            }

        }else{

            $uploadedFile["upload_message"] = "Image not specified or not uploaded successfully.";

            $uploadedFile["target_file"] = null;
        }

        return $uploadedFile;
    }

}