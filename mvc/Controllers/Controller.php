<?php
class Controller {

    public function index()
    {
        $view = new View();
        $view->render('home');
    }

    public function send404()
    {
        header('HTTP/1.0 404 Not Found');
        die();
    }
}