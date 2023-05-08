<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class PasswordLength implements Validator{
	public function isValid($data) : bool{
		if(strlen($data) >= 1 && strlen($data) <= 72)
			return true;
		else 
			return false;
	}
}