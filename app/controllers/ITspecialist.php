<?php
namespace app\controllers;

class ITspecialist extends \app\core\Controller 
{

	public function index() //viewUsers
	{
		//see all the employees and admins from the User table
		$user = new \app\models\User();
        $user = $user->getByUserId($_SESSION['user_id']);
        $this->view('ITspecialist/index', $user);
	
	}

	public function createUser()
	{
		//adding an admin or employee to the User Table

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