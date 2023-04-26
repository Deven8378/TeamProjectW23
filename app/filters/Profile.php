<?php
namespace app\filters;

#[\Attribute]
class Profile implements \app\core\AccessFilter
{
	public function execute()
	{
		// $user = new \app\models\User();
		// $user = $user->getByUserType($_SESSION['user_id']);
		// if($user->user_type != "admin")
		// {
		// 	header('location:/Main/index?error=Do not have permissions.');
		// 	return true;
		// }
		// return false;

		// $profile = new \app\models\Profile();
        // $userdetails = $profile->getProfile($user_id);

        // if($user->user_type == "itspecialist") {

        // 	if(!$userdetails){
        // 		header('location:/Profile/create/' . $user_id);
        // 		return true;
        // 	}
        // 	return false;
        // } 


        // if($userdetails){
        //     $user = new \app\models\User();
        //     $users = $user->getUserInfo($user_id);
        //     $this->view('Profile/userDetails', $users);
        // }else{
        //     // $user = new \app\models\User();
        //     // $user = $user->getByUserId($user_id);
        //     header('location:/Profile/create/' . $user_id);
        // }
	}
}