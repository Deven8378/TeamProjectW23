<?php
namespace app\core;

use PDO;
use RelfectionClass;


class Model
{

	public static ?PDO $connection = null;

	public function __construct() {

		if(self::$connection == null) {

			$env = \Dotenv\Dotenv::createImmutable(getcwd());

			$env->load();

			$env-> required(['db_host','db_user','db_pass','db_name','db_charset']);

			$host = $_ENV['db_host'];
			$dbname = $_ENV['db_name'];
			$user = $_ENV['db_user'];
			$pass = $_ENV['db_pass'];
			$charset = $_ENV['db_charset'];

			try {

				$options = [
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_CLASS,
					PDO::ATTR_EMULATE_PREPARES => false
				];

				self::$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user, $pass,$options);

				self::$connection->query("SET NAMES $charset");

			}
			catch(PDOException $e) {
			 	echo $e->getMessage();
			}

		}
	}


	public function isValid() : bool
	{
		$reflection = new ReflectionClass($this);
		$properties = $reflection->getProperties();

		foreach ($properties as $property) 
		{
			$attributes = $property->getAttributes(
				\app\core\Validator::class,
				\ReflectionAttribute::IS_INSTANCEOF
			);

			$data = $property->getValue($this);

			foreach ($attributes as $attribute) 
			{
				$validator = $attribute->newInstance();
				if(!$validator->isValid($data))
					return false;
			}
		}
		return true;
	}

	public function __call($method, $arguments)
	{
		if($this->isValid())
		{
			call_user_func_array([$this, $method], $arguments);
		}
	}

	public function __set($name, $value)
	{
		$method = "set$name";
		
		if(method_exists($this, $method))
			$this->$method($value);
	}

	public function __get($name)
	{
		if(isset($this->$name))
			return $this->$name;
		else
			return '';
	}

}