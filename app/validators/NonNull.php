<?php
namespace app\validators;

use Attribute;
use app\core\Validator;

#[Attribute]
class NonNull implements Validator{
	public function isValid($data) : bool{
		return $data != null;
	}
}