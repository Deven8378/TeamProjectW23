<?php
namespace app\controllers;

class Main extends \app\core\Controller
{
    #[\app\filters\Login]
    public function index()
    {
        $this->view('Main/index');
    }
}