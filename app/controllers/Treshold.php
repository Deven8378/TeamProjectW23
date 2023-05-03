<?php
namespace app\controllers;

class Treshold extends \app\core\Controller
{
   public function index()
   {
        if(isset($_POST['create'])){
                
            $category = new \app\models\Treshold();
            $category->treshold_category = $_POST['treshold_category'];
            $category->treshold_days = $_POST['treshold_days'];
            $category->insert();
            header('location:/Treshold/index');

        }else{
            $category = new \app\models\Treshold();
            $category = $category->getTresholds();
            $this->view('Treshold/index',$category);
        }
   }

   // public function create()
   // {
   //      if(isset($_POST['create'])){
            
   //          $treshold = new \app\models\Treshold();
   //          $treshold->treshold_category = $_POST['treshold_category'];
   //          $treshold->insert();
   //          header('location:/Treshold/index');

   //      }
   //     $this->view('Treshold/create');
   // }

   public function edit($treshold_id)
   {
       $this->view('Treshold/edit');
   }
   public function delete($treshold_id)
   {
        $treshold = new \app\models\Treshold();
        $category = $treshold->delete($treshold_id);
        header('location:/Treshold/index');
   }
    
}