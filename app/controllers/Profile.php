<?php
namespace app\controllers;


class Profile extends \app\core\Controller
{
	
	#[\app\filters\ITSpecialist]
	public function create($user_id)
	{
		//Once the User is created, You will create a profile for them
        if(isset($_POST['action']))
            {
                if($_POST['first_name'] != '' && $_POST['last_name'] != '' && $_POST['email'] != '' && $_POST['phone_number'] != '' && $_POST['status'] != ''
                    && $_POST['first_name'] != null && $_POST['last_name'] != null && $_POST['email'] != null && $_POST['phone_number'] != null && $_POST['status'] != null){

                    $profile = new \app\models\Profile();
                    $profile->user_id = $user_id;
                    $profile->first_name = htmlentities($_POST['first_name']);
                    $profile->middle_name = htmlentities($_POST['middle_name']);
                    $profile->last_name = htmlentities($_POST['last_name']);
                    $profile->email = htmlentities($_POST['email']);
                    $profile->phone_number = htmlentities($_POST['phone_number']);
                    $profile->status = htmlentities($_POST['status']);

                    $success = $profile->insert();

                    if($success)
                    {

                        header('location:/ITspecialist/index?success=New User Created');
                    }else{

                        header('location:/Profile/create/' . $user_id.'?error=Something went wrong');
                    }
                }else{
                    header('location:/Profile/create/' . $user_id.'?error=Fill up the dam things, except for middle name');
                }

            } 
            else 
            {
                $user = new \app\models\User();
                $usercheck = $user->getByUserId($user_id);
                $this->view('Profile/create', $usercheck);
            }

	}

	#[\app\filters\ITSpecialist]
    public function userDetails($user_id)
    {
        $profile = new \app\models\Profile();
        $userdetails = $profile->getProfile($user_id);

        if($userdetails){
            $user = new \app\models\User();
            $users = $user->getUserInfo($user_id);
            $this->view('Profile/userDetails', $users);
        }else{
            // $user = new \app\models\User();
            // $user = $user->getByUserId($user_id);
            header('location:/Profile/create/' . $user_id);
        }
    }

    #[\app\filters\ITSpecialist]
	public function delete($user_id)
	{
        
		$profile = new \app\models\Profile();
        // $profile->delete($user_id);
        $success = $profile->delete($user_id);

        if($success){
            $user = new \app\models\User();
            $user->delete($user_id);
            header('location:/ITspecialist/index?success=Profile for user ID ' . $user_id . ' has been deleted');
        }else{
            header('location:/ITspecialist/userDetails/$user_id?error=Profile for user ID ' . $user_id . ' was not delete');
        }
	}

}