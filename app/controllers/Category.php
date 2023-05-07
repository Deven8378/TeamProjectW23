<?php
namespace app\controllers;

use \app\models\Ingredient;

#[\app\filters\ProfileCreated]
#[\app\filters\Status]
#[\app\filters\Login]
#[\app\filters\Admin]
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
                    header('location:/Category/index?error=' . htmlentities($_POST['category_name']) .' already exits.');
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
                    $success = $category->update($category->category_id);

                    header('location:/Category/index?success=' . $category->category_name .' has been update.');

                }else{
                    header('location:/Category/index?error=' . htmlentities($_POST['editCategory_name']) .' already exits.');
                }
            }else{
                header('location:/Category/index?error=Please select an ID and modify Category name to edit.');
            }
            
        }else{

            header('location:/Category/index?error=Something went wrong when editing a Category. Please Try again.');
        }
   }
   public function delete($category_id)
   {
        $ingredient = new Ingredient();
        $ingredient = $ingredient->getIngredientByCategory($category_id);

        if(empty($ingredient)){
            $category = new \app\models\Category();
            $category = $category->getSpecificcategory($category_id);
            $success = $category->delete($category_id);
            if($success){
                header('location:/Category/index?success=Item Deleted: '. $category->category_name );
            }else{
                header('location:/Category/index?error=idk');
            }
        }else{
            header('location:/Category/index?error=Cannot Delete since some ingredients have this Category selected');
        }
       

        
   }
    
}