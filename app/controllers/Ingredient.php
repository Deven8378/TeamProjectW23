<?php
namespace app\controllers;

// use \app\models\Ingredient;
use \app\models\Category;
use \app\models\IngredientQuantity;

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
        $categories = new \app\models\Category();
        $categories = $categories->getCategories();
        if (isset($_POST['action'])) {
            $ingredient = new \app\models\Ingredient();
            $ingredient->name = $_POST['name'];
            $ingredient->category = $_POST['category'];
            $ingredient->description = $_POST['description'];

            $picture = $this->saveIngredient($_FILES['ingredientPicture']);

            if ($picture) {
                $ingredient->picture = $picture;
                $ingredient->addIngredient();
                header('location:/Ingredient/index?success=Ingredient Added');
            }
        } else {
            $this->view('Ingredient/createIngredient', $categories);
        }
    }

    #[\app\filters\EmployeeAndAdmin]
    public function ingredientDetails($ingredient_id){
        $ingredient = new \app\models\Ingredient();
        $success = $ingredient->getIngredientDetails($ingredient_id);
        $totalQuantity = new IngredientQuantity;
        $totalQuantity = $totalQuantity->getTotalQuantity($ingredient_id);
        $allQuantity = new IngredientQuantity;
        $allQuantity = $allQuantity->getAll($ingredient_id);


        if($success){
            $this->view('Ingredient/ingredientDetails', [$success, $totalQuantity, $allQuantity]);
        } else {
            header('location:/Ingredient/index?error=Ingredient does not exists.');
        }
    }

    #[\app\filters\Admin]
    public function edit($ingredient_id)
    {  
        $categories = new Category();
        $categories = $categories->getCategories();
        $ingredient = new \app\models\Ingredient();
        $ingredient = $ingredient->getIngredientDetails($ingredient_id);

        if(isset($_POST['action']))
        {
            $ingredient->name = $_POST['name'];
            $ingredient->category = $_POST['category'];
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
            $this->view('Ingredient/editIngredient', [$ingredient,$categories]);
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
    public function addQuantity($ingredient_id) 
    {
        if (isset($_POST['action'])) {
            $ingredient_quantity = new IngredientQuantity();
            $ingredient_quantity->arrival_date = $_POST['arrival_date'];
            $ingredient_quantity->expired_date = $_POST['expired_date'];
            $ingredient_quantity->quantity = $_POST['quantity'];
            $ingredient_quantity->price = $_POST['price'];
            $success = $ingredient_quantity->addIngredientQuantity($ingredient_id);

            if($success){
                header('location:/Ingredient/ingredientDetails/' . $ingredient_id. '?success=Ingredient added quantity.');
            } else {
                header('location:/Ingredient/editingredient/' . $ingredient_id. '?error=Error.');
            }
        } else {
            $this->view('Ingredient/addQuantity');
        }
    }

    #[\app\filters\Admin]
    public function editQuantity($iq_id)
    {  
        $ingredientQuantity = new IngredientQuantity();
        $ingredientQuantity = $ingredientQuantity->getOneQuantity($iq_id);

        if(isset($_POST['action']))
        {
            $ingredientQuantity->quantity = $_POST['quantity'];
            $ingredientQuantity->arrival_date = $_POST['arrival_date'];
            $ingredientQuantity->expired_date = $_POST['expired_date'];
            $ingredientQuantity->price = $_POST['price'];
            $success = $ingredientQuantity->editQuantity($iq_id);

            if($success){
                header('location:/Ingredient/ingredientDetails/' . $ingredientQuantity->ingredient_id . '?success=Ingredient Quantity Updated.');
            } else {
                header('location:/Ingredient/ingredientDetails/' . $ingredientQuantity->ingredient_id . '?error=Error.');
            }
        } else {
            echo $ingredientQuantity->iq_id;
            $this->view('Ingredient/editQuantity', $ingredientQuantity);
        }
    }

    #[\app\filters\Admin]
    public function deleteQuantity($iq_id)
    {
        $ingredientQuantity = new IngredientQuantity();
        $ingredient = $ingredientQuantity->getOneQuantity($iq_id);
        $ingredientNumber = $ingredient->ingredient_id;
        $success = $ingredientQuantity->deleteQuantity($iq_id);
        if($success){
            header('location:/Ingredient/ingredientDetails/'. $ingredientNumber .'?success=Ingredient Quantity deleted.');
        } else {
            header('location:/Ingredient/ingredientDetails'. $ingredientNumber .'?error=Error occured.');
        }
    }

    public function quantityUpdate($ingredient_id) { //form action method
        $allQuantity = new IngredientQuantity;
        $allQuantity = $allQuantity->getAll($ingredient_id);
        $counter = 1; //each product quantity row's input name is quantity$counter

        if (isset($_POST['action'])) {
                foreach ($allQuantity as $oneQuantity) {
                $oneQuantity = $oneQuantity->getOneQuantity($oneQuantity->iq_id);
                $oneQuantity->quantity = $_POST['quantity' . $counter];
                ++$counter;
                $success = $oneQuantity->editQuantity($oneQuantity->pq_id);
            }
           
            if ($success) {
        
                 header('location:/Ingredient/ingredientDetails/'. $ingredient_id .'?success=Quantities Saved.');
             } else {
            
            header('location:/Ingredient/ingredientDetails/'. $ingredient_id .'?error=Error occured.');
            }

        }

    }
}