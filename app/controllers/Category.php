<?php
namespace app\controllers;

use \app\models\Ingredient;

class Category extends \app\core\Controller
{
   public function index()
   {    
        $category = new \app\models\Category();
        $category = $category->getCategories();
        $this->view('Category/index',$category);  
   }

   public function create()
   {
        if(isset($_POST['create'])){
            
            if($_POST['category_name'] != '' && $_POST['category_name'] != null){

                // Check if Category already exist or not
                $category = new \app\models\Category();
                $checkCategory = $category->getByCategoryName($_POST['category_name']);
                if(!$checkCategory){
                    $category->category_name = htmlentities($_POST['category_name']);
                    $success = $category->insert();
                    if($success){
                        header('location:/Category/index?success=' . $category->category_name . ' was added to Categories');
                    }else{
                        header('location:/Category/index?error=Something went wrong when creating a new Category. Please Try again.');
                    } 
                }else{
                    header('location:/Category/index?error=Category already exits.');
                }
            }else{
                header('location:/Category/index?error=Please fill up all criteria.');
            }
            
        }else{
            $category = new \app\models\Category();
            $category = $category->getCategories();
            $this->view('Category/index',$category);  
        }
   }

   public function edit()
   {
        if(isset($_POST['edit'])) {
            if($_POST['editCategory_id'] != ''
                && $_POST['editCategory_id'] != null
                && $_POST['editCategory_name'] != ''
                && $_POST['editCategory_name'] != null
            ){
                $category = new \app\models\Category();
                $checkCategory = $category->getByCategoryName($_POST['editCategory_name']);
                if(!$checkCategory){
                    $category->category_id = htmlentities($_POST['editCategory_id']);
                    $category->category_name = htmlentities($_POST['editCategory_name']);
                    $category->update($category->category_id);
                    header('location:/Category/index?success=' . $category->category_name .' has been update.');
                }else{
                    header('location:/Category/index?error=Category already exits.');
                }
            }else{
                header('location:/Category/index?error=Please select a Criteria to edit.');
            }
            
        }else{

            header('location:/Category/index?error=Something went wrong when editing a Category. Please Try again.');
        }
   }
   public function delete($category_id)
   {
        $ingredient = new Ingredient();
        $ingredients = $ingredient->getIngredientByCategory($category_id);

        if(empty($ingredients)){
            $category = new \app\models\Category();
            // get category name and place it in message when deleted
            $success = $category->delete($category_id);
            if($success){

                // will not work rn
                header('location:/Category/index?success=' . $category->category_name . 'Item Deleted');
            }else{
                header('location:/Category/index?error=idk');
            }
        }else{
            header('location:/Category/index?error=Cannot Delete since some ingredients have this Category selected');
        }
       

        
   }
    
}