<?php
namespace app\controllers;

class Ingredient extends \app\core\Controller
{

    #[\app\filters\EmployeeAndAdmin]
    public function index()
    {
        $ingredient = new \app\models\Ingredient();
        $ingredients = $ingredient->getAll();
        $this->view('Ingredient/index', $ingredients);
    }

    #[\app\filters\Admin]
    public function createIngredient() 
    {
        if (isset($_POST['action'])) {
            $ingredient = new \app\models\Ingredient();
            $ingredient->name = $_POST['name'];
            $ingredient->description = $_POST['description'];
            $ingredient->price = $_POST['price'];
            $picture = $this->saveIngredient($_FILES['ingredientPicture']);

            if ($picture) {
                $ingredient->picture = $picture;
                $ingredient->addIngredient();
                header('location:/Ingredient/index?success=Ingredient Added');
            }
        } else {
            $ingredient = new \app\models\Ingredient();
            $ingredients = $ingredient->getAll();
            $this->view('Ingredient/createIngredient', $ingredients);
        }
    }

    #[\app\filters\EmployeeAndAdmin]
    public function ingredientDetails($ingredient_id){
        $ingredient = new \app\models\Ingredient();
        $success = $ingredient->getIngredientDetails($ingredient_id);

        if($success){
            $this->view('Ingredient/ingredientDetails', $success);
        } else {
            header('location:/Ingredient/index?error=Ingredient does not exists.');
        }
    }
}