<?php
namespace app\controllers;

class Main extends \app\core\Controller
{
    #[\app\filters\ProfileCreated]
    #[\app\filters\Login]
    #[\app\filters\EmployeeAndAdmin]
    public function index()
    {
        $user = new \app\models\User();
        $user = $user->getByUserId($_SESSION['user_id']);
        
        $this->view('Main/index', $user);
        
    }
}