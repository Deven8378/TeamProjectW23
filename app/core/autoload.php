<?php
spl_autoload_register(
    function($class_name) 
    {
        $class_name = str_replace("\\", DIRECTORY_SEPARATOR, $class_name);
		require_once($class_name . '.php');
    }
);