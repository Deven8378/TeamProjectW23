<?php
namespace app\filters;

#[\Attribute]
class ProfileCreated implements \app\core\AccessFilter
{
	public function execute()
	{
		if (isset($_SESSION['user_id']))
		{
			$profile = new \app\models\Profile();
			$profile = $profile->getByUserId($_SESSION['user_id']);
			if(!$profile)
			{
				session_destroy();
				header('location:/User/index?error=Please contact your IT Specialist.');
				return true;
			}
		}
		return false;
	}
}