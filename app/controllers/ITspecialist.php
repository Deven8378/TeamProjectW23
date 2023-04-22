<?php
namespace app\controllers;

class ITspecialist extends \app\core\Controller 
{

	public function index() //viewUsers
	{
		//see all the employees and admins from the User table
        $user = new \app\models\User();
        // $user = $user->getByUserId($_SESSION['user_id']);
        $users = $user->getAllUsers();
        $this->view('ITspecialist/index', $users);
	
	}

	public function createUser()
	{
		//adding an admin or employee to the User Table
		// if (!isset($_SESSION['user_type']))
        // {
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
                        $_SESSION['user_type'] = $user->user_type;
                        // header('location:/User/index');
                        header('location:/ITspecialist/createProfile');
                    }
                    else
                    {
                        // header('location:/User/register?error=Please enter in a username and password.');
                        header('location:/ITspecialist/createUser?error=Please enter in a username and password.');
                    }
                    
                } 
                else 
                {
                    // header('location:/User/register?error=Username @' . $_POST['username'] . ' already in use.');
                    header('location:/ITspecialist/createUser?error=Username @' . $_POST['username'] . ' already in use.');
                }
            } 
            else 
            {
                // $this->view('User/register');
                $this->view('ITspecialist/createUser');
            }
        // }
        // else 
        // {
        //     header('location:/Main/index?error=User already logged in. Please log out first before registering a new account.');
        // }

	}

	public function createProfile($user_id)
	{
		//Once the User is created, You will create a profile for them

	}

	public function editUser($user_id)
	{
		//edit the users information (username or/and password)

	}

	public function editProfile($user_id)
	{
		// edit the users profile information (first_name, middle_name, last_name, email,phone_number and status)
	}

	public function deleteUser($user_id)
	{
		
	}

	public function viewUserDetails($user_id)
	{

	}

}