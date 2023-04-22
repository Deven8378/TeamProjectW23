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
                        // $_SESSION['user_type'] = $user->user_type; //We don't want to change the session user_type when we create a new user

                        header('location:/ITspecialist/createProfile/' . $user->user_id . '');
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
        if(isset($_POST['action']))
            {
                //BIG ISSSUE !!!! IF THE IT CREATE THE USER, THEY WILL BE SENT HERE. HOWEVER, IF THEY DECIDE TO GO BACK TO THE LANDING PAGE, THE USER WILL STILL BE CREATED BUT WILL NOT BE VISIBLE. SO WE WONT KNOW WHERE IT IS.
                if($_POST['first_name'] != '' && $_POST['last_name'] != '' && $_POST['email'] != '' && $_POST['phone_number'] != '' && $_POST['status'] != ''
                    && $_POST['first_name'] != null && $_POST['last_name'] != null && $_POST['email'] != null && $_POST['phone_number'] != null && $_POST['status'] != null){

                    $profile = new \app\models\Profile();
                    $profile->user_id = $user_id;
                    $profile->first_name = $_POST['first_name'];
                    $profile->middle_name = $_POST['middle_name'];
                    $profile->last_name = $_POST['last_name'];
                    $profile->email = $_POST['email'];
                    $profile->phone_number = $_POST['phone_number'];
                    $profile->status = $_POST['status'];

                    $success = $profile->insert();

                    if($success)
                    {

                        header('location:/ITspecialist/index?success=New User Created');
                    }else{

                        header('location:/ITspecialist/createProfile/' . $user_id.'?error=Something went wrong');
                    }
                }else{
                    header('location:/ITspecialist/createProfile/' . $user_id.'?error=Fill up the dam things, except for middle name');
                }

            } 
            else 
            {
                // $this->view('User/register');
                $user = new \app\models\User();
                $usercheck = $user->getByUserId($user_id);
                $this->view('ITspecialist/createProfile', $usercheck);
            }

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