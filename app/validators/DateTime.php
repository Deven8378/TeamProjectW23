<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class DateTime implements Validator{
	public function isValid($data) : bool{
		try{
			new \DateTime($data);
			return true;
		}catch(Exception $e){
			return false;
		}
	}
}