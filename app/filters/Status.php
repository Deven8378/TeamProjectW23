<?php
namespace app\filters;

#[\Attribute]
class Status implements \app\core\AccessFilter
{
	public function execute()
	{
		if (isset($_SESSION['user_id']))
		{
			$profile = new \app\models\Profile();
			$profile = $profile->getByUserId($_SESSION['user_id']);
			$status = $profile->status; 
			if($status == 'inactive')
			{
				// if($_SESSION['user_type'] != 'itspecialist'){

					session_destroy();
					header('location:/User/index?error=Please contact your IT Specialist.');
					return true;
				// }
			}
		}
		return false;
	}
}