<?php
namespace app\controllers;

class Inventory extends \app\core\Controller
{
    #[\app\filters\Login]
    public function index()
    {
        $this->view('Inventory/index');
    }

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
                $ingredient->insert();
                header('location:/Ingredient/index?success=Ingredient Added');
            }
            
        } else 
        $this->view('Inventory/createIngredient');
    }
}
