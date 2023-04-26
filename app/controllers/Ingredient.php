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
            $picture = $this->saveIngredient($_FILES['ingredientPicture']);

            if ($picture) {
                $ingredient->picture = $picture;
                $ingredient->addIngredient();
                header('location:/Ingredient/index?success=Ingredient Added');
            }
        } else {
            $this->view('Ingredient/createIngredient');
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

    #[\app\filters\Admin]
    public function edit($ingredient_id)
    {  
        $ingredient = new \app\models\Ingredient();
        $ingredient = $ingredient->getIngredientDetails($ingredient_id);

        if(isset($_POST['action']))
        {
            $ingredient->name = $_POST['name'];
            $ingredient->description = $_POST['description'];
            $picture = $this->saveIngredient($_FILES['ingredientPicture']);

            if($picture){
                $ingredient->picture = $picture;
            }
            $success = $ingredient->editIngredient($ingredient_id);

            if($success){
                header('location:/Ingredient/ingredientDetails/' . $ingredient_id. '?success=Ingredient Updated.');
            } else {
                header('location:/Ingredient/editIngredient/' . $ingredient_id. '?error=Error.');
            }
        } else {
            $this->view('Ingredient/editIngredient', $ingredient);
        }
    }

    #[\app\filters\Admin]
    public function delete($ingredient_id)
    {
        $ingredient = new \app\models\Ingredient();
        $success = $ingredient->deleteIngredient($ingredient_id);
        if($success){
            header('location:/Ingredient/index?success=Ingredient deleted.');
        } else {
            header('location:/Ingredient/index?error=Error occured.');
        }
    }

    #[\app\filters\Admin]
    public function addQuantity() 
    {
        if (isset($_POST['action'])) {
            $ingredient_quantity = new \app\models\IngredientQuantity();
            $ingredient_quantity->arrival_date = $_POST['arrival_date'];
            $ingredient_quantity->expired_date = $_POST['expired_date'];
            $ingredient_quantity->quantity = $_POST['quantity'];
            $success->price = $_POST['price'];

            if($success){
                header('location:/Ingredient/ingredientDetails/' . $ingredient_id. '?success=Ingredient added quantity.');
            } else {
                header('location:/Ingredient/editingredient/' . $ingredient_id. '?error=Error.');
            }
        } else {
            $this->view('Ingredient/addQuantity');
        }
    }
}