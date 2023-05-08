<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class NameLength implements Validator{
	public function isValid($data) : bool{
	if(strlen($data) >= 1 && strlen($data) <= 50)
			return true;
		else 
			return false;
	}
}