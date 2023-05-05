<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class NonEmpty implements Validator{
	public function isValid($data) : bool{
		return !empty($data);
	}
}