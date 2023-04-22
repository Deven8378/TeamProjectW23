<?php
namespace app\core;

class App
{
    public function __construct()
    {
        $request = $this->parseUrl($_GET['url'] ?? '');

        $controller = 'User';
        $method = 'index';
        $params = [];
        
        if (file_exists('app/controllers/' . $request[0] . '.php'))
        {            
            $controller = $request[0];
            unset($request[0]);
        }

        $controller = 'app\\controllers\\' . $controller;
        $controller = new $controller;

        if (isset($request[1]) && method_exists($controller, $request[1]))
        {
            $method = $request[1];
            unset($request[1]);
        }

        $params = array_values($request);

        if($this->filter($controller, $method, $params))
            return;

        call_user_func_array([$controller, $method], $params);
    }

    public function filter($controller, $method, $params)
    {
        $reflection = new \ReflectionObject($controller);
        $classAttributes = $reflection->getAttributes(\app\core\AccessFilter::class, \ReflectionAttribute::IS_INSTANCEOF);
        $methodAttributes = $reflection->getMethod($method)->getAttributes(\app\core\AccessFilter::class, \ReflectionAttribute::IS_INSTANCEOF);
        $attributes = array_values(array_merge($classAttributes, $methodAttributes));
        foreach ($attributes as $attribute) {
            $filter = $attribute->newInstance();
            if($filter->execute())
                return true;
        }
        return false;
    }

    function parseUrl($url)
    {
        return explode('/', trim($url, '/'));
    }
}