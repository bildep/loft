<?php

class App
{
    public function __construct($url)
    {
        $url = rtrim($url, '/');
        $url = explode('/', $url);


        if (empty($url[0])) {
            $class = "Controller";

        } else {
            $class = $url[0];
            $method = $url[1];
        }

        $controller = new $class;

        if (isset($url[2])) {
            $controller->$method($url[2]);
        } else {
            if (isset($url[1])) {
                if (! method_exists($controller, $method)) {
                    $controller->send404();
                }
                $controller->$method();
            } else {
                $method = 'index';
                $controller->$method();
            }
        }
    }
}