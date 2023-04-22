<?php
namespace app\controllers;

class User extends \app\core\Controller
{
    public function index()
    {
        if (!isset($_SESSION['user_id']))
        {
            if(isset($_POST['action']))
            {
                $user = new \app\models\User();
                $user = $user->getByUsername($_POST['username']);
                
                if($user)
                {
                    if(password_verify($_POST['password'], $user->password_hash))
                    {
                        //the user is correct
                        $_SESSION['user_id'] = $user->user_id;
                        $_SESSION['user_type'] = $user->user_type;


                        //Redirect the User to the correct page depending on the user_type
                        if($_SESSION['user_type'] =="itspecialist"){
                            header('location:/ITspecialist/index');
                        }else
                        {
                            header('location:/Main/index');
                        }

                    } 
                    else 
                    {
                        header('location:/User/index?error=Bad username/password combination.');
                    }
                } 
                else 
                {    //no such user
                    header('location:/User/index?error=Bad username/password combination.');
                }
            } 
            else 
            {
                $this->view('User/index');
            }
        }
        else 
        {
            header('location:/Main/index?error=User already logged in.');
        }
    }

    public function register()
    {
        if (!isset($_SESSION['user_id']))
        {
            if(isset($_POST['action']))
            {
                $user = new \app\models\User();
                $usercheck = $user->getByUsername($_POST['username']);
                if(!$usercheck)
                {
                    if ($_POST['username'] != '' 
                        && $_POST['username'] != null 
                        && $_POST['password'] != '' 
                        && $_POST['password'] != null) 
                    {
                        $user->username = $_POST['username'];
                        $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $user->user_type = $_POST['user_type'];
                        $user->user_id = $user->insert();
                        $_SESSION['user_id'] = $user->user_id;
                        header('location:/User/index');
                    }
                    else
                    {
                        header('location:/User/register?error=Please enter in a username and password.');
                    }
                    
                } 
                else 
                {
                    header('location:/User/register?error=Username @' . $_POST['username'] . ' already in use.');
                }
            } 
            else 
            {
                $this->view('User/register');
            }
        }
        else 
        {
            header('location:/Main/index?error=User already logged in. Please log out first before registering a new account.');
        }
    }

    public function logout()
    {
        if(isset($_SESSION['user_id']))
        {
            session_destroy();
            header('location:/Main/index?success=Successfully logged out.');
        }
        else
        {
            header('location:/Main/index?error=ERROR: Could not log out.');
        }
        
    }
}