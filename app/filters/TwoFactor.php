<?php
namespace app\filters;

#[\Attribute]
class TwoFactor implements \app\core\AccessFilter
{
	public function execute()
	{
		if (!isset($_SESSION['secretkey'])) {
			header('location:/User/index?error=Please go through the 2 factor authentication process');
			return true;
		}
		else
			return false;
	}
}