<?php
namespace app\controllers;

#[\app\filters\ProfileCreated]
#[\app\filters\Status]
#[\app\filters\Login]
#[\app\filters\EmployeeAndAdmin]
class Main extends \app\core\Controller
{
    public function index()
    {
        $this->view('Main/index');
    }
}