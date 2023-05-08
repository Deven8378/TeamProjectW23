<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class Number implements Validator{
	public function isValid($data) : bool{
		return is_numeric($data);
	}
}