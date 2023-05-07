<?php
namespace app\controllers;

use \app\models\Category;
use \app\models\IngredientQuantity;
use \app\models\User;

#[\app\filters\ProfileCreated]
#[\app\filters\Status]
#[\app\filters\Login]
class Ingredient extends \app\core\Controller
{

    //Viewing

    #[\app\filters\EmployeeAndAdmin]
    public function index()
    {
        $ingredient = new \app\models\Ingredient();
        $ingredients = $ingredient->getAll();

        $category = new Category();
        $categories = $category->getCategories();

        $numResults = $ingredient->getSum();

        $user = new User();
        $user = $user->getByUserType(htmlentities($_SESSION['user_id']));
        $isAdmin = false;
        if ($user->user_type == "admin"){
            $isAdmin = true;
        }
        $this->view('Ingredient/index', [$ingredients, $categories, $numResults, $isAdmin]);
    }

    #[\app\filters\EmployeeAndAdmin]
    public function ingredientDetails($ingredient_id)
    {
        $ingredient = new \app\models\Ingredient();
        $success = $ingredient->getIngredientDetails($ingredient_id);

        $totalQuantity = new IngredientQuantity;
        $totalQuantity = $totalQuantity->getTotalQuantity($ingredient_id);

        $allQuantity = new IngredientQuantity;
        $allQuantity = $allQuantity->getAll($ingredient_id);

        $user = new User();
        $user = $user->getByUserId($_SESSION['user_id']);

        $type = $user->user_type;
        $isAdmin = false;
        if ($type == "admin"){
            $isAdmin = true;
        }

        if($success){
            $this->view('Ingredient/ingredientDetails', [$success, $totalQuantity, $allQuantity, $isAdmin]);
        } else {
            header('location:/Ingredient/index?error=Ingredient does not exists.');
        }
    }

    // Inserting, Editing, Deleting

    #[\app\filters\Admin]
    public function createIngredient() 
    {
        if (isset($_POST['action'])) 
        {
            if($_POST['name']!='' && $_POST['name']!=null && $_POST['category']!='' && $_POST['category']!=null)
            {
                $ingredient = new \app\models\Ingredient();
                $ingredient->name = htmlentities($_POST['name']);
                $ingredient->category = htmlentities($_POST['category']);
                $ingredient->description = htmlentities($_POST['description']);

                $picture = $this->saveIngredient($_FILES['ingredientPicture']);

                if($picture) {
                    $ingredient->picture = $picture;
                }else{
                    $ingredient->picture = 'default.jpg';
                }

                $success = $ingredient->addIngredient();
                if($success){
                    header('location:/Ingredient/index?success='. $ingredient->name .' has been added');
                }else{
                     header('location:/Ingredient/index?error=Something went wrong when creating a new Ingredient. Please Try again.');
                }

            }else{
                header('location:/Ingredient/createIngredient?error=Please enter a Name and select a Category.');
            }

        } else {
            $categories = new Category();
            $categories = $categories->getCategories();
            $this->view('Ingredient/createIngredient', $categories);
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
            if($_POST['name']!='' && $_POST['name']!=null && $_POST['category']!='' && $_POST['category']!=null){
                $ingredient->name = htmlentities($_POST['name']);
                $ingredient->category = htmlentities($_POST['category']);
                $ingredient->description = htmlentities($_POST['description']);
                $picture = $this->saveIngredient($_FILES['ingredientPicture']);

                if($picture){ 
                    $ingredient->picture = $picture;
                }
                $success = $ingredient->editIngredient($ingredient_id);

                if($success){
                    header('location:/Ingredient/ingredientDetails/' . $ingredient_id. '?success=Ingredient Updated.');
                } else {
                    header('location:/Ingredient/edit/' . $ingredient_id. '?error=Please modify in order to edit.');
                }
            } else {
                header('location:/Ingredient/edit/' . $ingredient_id. '?error=Please fill the required fields.');
            }
        } else {
            $this->view('Ingredient/edit', [$ingredient,$categories]);
        }
    }

    #[\app\filters\Admin]
    public function delete($ingredient_id)
    {
        $ingredient = new \app\models\Ingredient();
        $success = $ingredient->deleteIngredient($ingredient_id);
        if($success){
            unlink("ingredientImages/$success->picture");
            header('location:/Ingredient/index?success=Ingredient deleted.');
        } else {
            header('location:/Ingredient/index?error=Error occured.');
        }
    }

    #[\app\filters\Admin]
    public function addQuantity($ingredient_id) 
    {
        if (isset($_POST['action'])) {
            if(!empty($_POST['arrival_date']) && !empty($_POST['expired_date']) &&
                !empty($_POST['quantity']) && !empty($_POST['price']))
            {
                if(strtotime($_POST['expired_date']) > strtotime($_POST['arrival_date']))
                {
                    $ingredient_quantity = new IngredientQuantity();
                    $ingredient_quantity->arrival_date = $_POST['arrival_date'];
                    $ingredient_quantity->expired_date = $_POST['expired_date'];
                    $ingredient_quantity->quantity = $_POST['quantity'];
                    $ingredient_quantity->price = $_POST['price'];
                    $success = $ingredient_quantity->addIngredientQuantity($ingredient_id);

                    if($success){
                        header('location:/Ingredient/ingredientDetails/' . $ingredient_id. '?success=Ingredient added quantity.');
                    } else {
                        header('location:/Ingredient/ingredientDetails/' . $ingredient_id. '?error=Something went wrong when adding quantity. Please Try again.');
                    } 
                } else {
                    header('location:/Ingredient/addQuantity/' . $ingredient_id. '?error=Please recheck dates.');
                }
            } else {
                header('location:/Ingredient/addQuantity/' . $ingredient_id. '?error=Please fill the required fields.');
            }
        } else {
            $ingredient = new \app\models\Ingredient();
            $ingredient = $ingredient->getIngredientDetails($ingredient_id);
            $this->view('Ingredient/addQuantity', $ingredient);
        }
    }

    #[\app\filters\EmployeeAndAdmin]
    public function editQuantity($iq_id)
    {  
        $ingredientQuantity = new IngredientQuantity();
        $ingredientQuantity = $ingredientQuantity->getOneQuantity($iq_id);

        if (isset($_POST['action'])) {
            if(!empty($_POST['arrival_date']) && !empty($_POST['expired_date']) &&
                !empty($_POST['quantity']) && !empty($_POST['price']))
            {
                if(strtotime($_POST['expired_date']) > strtotime($_POST['arrival_date']))
                {
                    $ingredientQuantity->quantity = $_POST['quantity'];
                    $ingredientQuantity->arrival_date = $_POST['arrival_date'];
                    $ingredientQuantity->expired_date = $_POST['expired_date'];
                    $ingredientQuantity->price = $_POST['price'];
                    $success = $ingredientQuantity->editQuantity($iq_id);

                    if($success){
                        header('location:/Ingredient/ingredientDetails/' . $ingredientQuantity->ingredient_id . '?success=Ingredient Quantity Updated.');
                    } else {
                        header('location:/Ingredient/editQuantity/' . $iq_id . '?error=Please modify in order to edit.');
                    }
                } else {
                    header('location:/Ingredient/editQuantity/' . $iq_id. '?error=Please recheck dates.');
                }
            } else {
                header('location:/Ingredient/editQuantity/' . $iq_id. '?error=Please fill the required fields.');
            }
        } else {
            $ingredientQuantity = new IngredientQuantity();
            $ingredientQuantity = $ingredientQuantity->getOneQuantity($iq_id);
            $this->view('Ingredient/editQuantity', $ingredientQuantity);
        }
    }

    #[\app\filters\EmployeeAndAdmin]
    public function quantityUpdate($iq_id) 
    { 
        $ingredientQuantity = new IngredientQuantity();
        $ingredientQuantity = $ingredientQuantity->getOneQuantity($iq_id);

        if(isset($_POST['action']))
        {
            $ingredientQuantity->quantity = $_POST['quantity'];
            $success = $ingredientQuantity->quantityUpdate($iq_id);

            if($success){
                header('location:/Ingredient/ingredientDetails/' . $ingredientQuantity->ingredient_id . '?success=Ingredient Quantity Updated.');
            } else {
                header('location:/Ingredient/editQuantity/' . $iq_id . '?error=Please modify in order to edit.');
            }
        } else {
            $ingredientQuantity = new IngredientQuantity();
            $ingredientQuantity = $ingredientQuantity->getOneQuantity($iq_id);
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

    // Filters

    #[\app\filters\EmployeeAndAdmin]
    public function search() 
    {
        $ingredients = new \app\models\Ingredient();
        $searched = $ingredients->search($_GET['search']);

        $categories = new \app\models\Category();
        $categories = $categories->getCategories();

        $numResults = new \app\models\Ingredient();
        $numResults = $numResults->getSearchedSum($_GET['search']);

        $user = new \app\models\User();
        $user = $user->getByUserType($_SESSION['user_id']);
        $isAdmin = false;
        if ($user->user_type == "admin")
            $isAdmin = true;

        if($numResults->num_results != 0){
            $this->view('Ingredient/index', [$searched, $categories, $numResults, $isAdmin]);
        } else {
            header('location:/Ingredient/index?error=No matches found.');
        }
    }
    
    #[\app\filters\EmployeeAndAdmin]
    public function filterByCategory($category_id) {
        $ingredients = new \app\models\Ingredient();
        $searched = $ingredients->getIngredientByCategory($category_id);

        $categories = new \app\models\Category();
        $categories = $categories->getCategories();

        $numResults = $ingredients->getFilteredSum($category_id);

        $user = new \app\models\User();
        $user = $user->getByUserType($_SESSION['user_id']);
        $isAdmin = false;
        if ($user->user_type == "admin")
            $isAdmin = true;

        if($numResults->num_results != 0){
            $this->view('Ingredient/index', [$searched, $categories, $numResults, $isAdmin]);
        } else {
            header('location:/Ingredient/index?error=No matches found.');
        }
    }
}