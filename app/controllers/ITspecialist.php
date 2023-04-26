<?php
namespace app\controllers;

class ITspecialist extends \app\core\Controller 
{
    #[\app\filters\ITSpecialist]
	public function index() //viewUsers
	{
		//see all the employees and admins from the User table
        $user = new \app\models\User();
        $users = $user->getAllUserInfo();
        $this->view('ITspecialist/index', $users);
	}

    #[\app\filters\ITSpecialist]
	public function createUser()
	{
		//adding an admin or employee to the User Table

            if(isset($_POST['action']))
            {
                $user = new \app\models\User();
                $usercheck = $user->getByUsername($_POST['username']);
                if(!$usercheck)
                {
                    if ($_POST['username'] != '' 
                        && $_POST['username'] != null 
                        && $_POST['password'] != '' 
                        && $_POST['password'] != null
                        && $_POST['user_type'] != ''
                        && $_POST['user_type'] != null) 
                    {
                        $user->username = htmlentities($_POST['username']);
                        $user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $user->user_type = htmlentities($_POST['user_type']);
                        $user->user_id = $user->insert();

                        header('location:/Profile/createProfile/' . $user->user_id . '');
                    }
                    else
                    {
                        header('location:/ITspecialist/createUser?error=Please enter all criteria.');
                    }
                    
                } 
                else 
                {
                    header('location:/ITspecialist/createUser?error=Username @' . $_POST['username'] . ' already in use.');
                }
            } 
            else 
            {
                $this->view('ITspecialist/createUser');
            }


	}


    #[\app\filters\ITSpecialist]
	public function editUser($user_id)
	{
		//edit the users information (username or/and password)

	}

    #[\app\filters\ITSpecialist]
	public function editProfile($user_id)
	{
		// edit the users profile information (first_name, middle_name, last_name, email,phone_number and status)
	}

    
}