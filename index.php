<?php
// index.php is the entry point to the application
// include the dependecies
require_once 'app/core/init.php';
// to include external files in PHP we can use include, include_once, require, and require_once
// require is for stuff you NEED
// include can be less fatal
// _once is to ensure things only are included once
new app\core\App;