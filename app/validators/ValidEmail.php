<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class ValidEmail implements Validator{
	public function isValid($data) : bool{
		return $data != null && filter_var($data, FILTER_VALIDATE_EMAIL);
	}
}