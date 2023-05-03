<?php
namespace app\controllers;

class Category extends \app\core\Controller
{
   public function index()
   {
        if(isset($_POST['create'])){
                
            $category = new \app\models\Category();
            $category->category_name = $_POST['category_name'];
            // $category->Category_days = $_POST['Category_days'];
            $category->insert();
            header('location:/Category/index');

        }else{
            $category = new \app\models\Category();
            $category = $category->getCategories();
            $this->view('Category/index',$category);
        }
   }

   // public function create()
   // {
   //      if(isset($_POST['create'])){
            
   //          $category = new \app\models\Category();
   //          $category->category_name = $_POST['category_name'];
   //          $category->insert();
   //          header('location:/Category/index');

   //      }
   //     $this->view('Category/create');
   // }

   public function edit($category_id)
   {
       $this->view('Category/edit');
   }
   public function delete($category_id)
   {
        $category = new \app\models\Category();
        $category = $category->delete($category_id);
        header('location:/Category/index');
   }
    
}