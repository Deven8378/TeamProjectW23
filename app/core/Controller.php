<?php
namespace app\core;

class Controller 
{
    function view($name, $data = []) 
    {
        include('app/views/' . $name . '.php');
    }

     public function saveProduct($file){
        if(empty($file['tmp_name']))
            return false;

        $check = getimagesize($file['tmp_name']);
        $allowed_types = ['image/jpeg'=>'jpg', 'image/png'=>'png'];
        if(in_array($check['mime'], array_keys($allowed_types))){
             $ext = $allowed_types[$check['mime']];
             $filename = uniqid() . ".$ext";
             move_uploaded_file($file['tmp_name'], 'productImages/'.$filename);
             return $filename;
        }else
            return '';
    }

    public function saveIngredient($file){
        if(empty($file['tmp_name']))
            return false;

        $check = getimagesize($file['tmp_name']);
        $allowed_types = ['image/jpeg'=>'jpg', 'image/png'=>'png'];
        if(in_array($check['mime'], array_keys($allowed_types))){
             $ext = $allowed_types[$check['mime']];
             $filename = uniqid() . ".$ext";
             move_uploaded_file($file['tmp_name'], 'ingredientImages/'.$filename);
             return $filename;
        }else
            return '';
    }
}