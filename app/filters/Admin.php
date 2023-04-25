<?php
namespace app\filters;

#[\Attribute]
class Admin implements \app\core\AccessFilter
{
	public function execute()
	{
		$user = new \app\models\User();
		$user = $user->getByUserType($_SESSION['user_id']);
		if($user->user_type != "admin")
		{
			header('location:/Main/index?error=Do not have permissions.');
			return true;
		}
		return false;
	}
}