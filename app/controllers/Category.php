<?php
namespace app\controllers;

class Category extends \app\core\Controller
{
   public function index()
   {
       $this->view('Category/index');
   }

   public function create()
   {
       $this->view('Category/create');
   }

   public function edit($treshold_id)
   {
       $this->view('Category/edit');
   }
   public function delete($treshold_id)
   {
       $this->view('Category/index?success=testing delete button');
   }
    
}