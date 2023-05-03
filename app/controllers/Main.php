<?php
namespace app\controllers;

class Main extends \app\core\Controller
{
    #[\app\filters\ProfileCreated]
    #[\app\filters\Status]
    #[\app\filters\Login]
    #[\app\filters\EmployeeAndAdmin]
    public function index()
    {
        $this->view('Main/index');
    }
}