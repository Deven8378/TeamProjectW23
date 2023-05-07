<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class ValidEmail implements Validator{
	public function isValid($data) : bool{
		$regex = "^([a-zA-Z0-9][a-zA-Z0-9\_\.\-]+)\@([a-zA-Z]([a-zA-Z0-9\.]+?)[a-zA-Z])\.(com|ca)$";
		$valid = preg_match($regex, $data);
		if($valid == 1){
			return true;
		} else {
			return false;
		}
	}
}