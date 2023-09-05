<?php

namespace App\Bootstrap;

class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $pageNotFound = false;
    protected $params = [];

    public function __construct()
    {
        $URL_ARRAY = $this->parseURL();
        $this->getController($URL_ARRAY);
        $this->getMethod($URL_ARRAY);
        $this->getParams($URL_ARRAY);

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function parseURL(string $url = null)
    {
        $REQUEST_URI =   explode('?', substr(filter_input(INPUT_SERVER, 'REQUEST_URI'), 1));
        $REQUEST_URI =   explode('/', $REQUEST_URI[0]);

        return $REQUEST_URI;
    }

    private function getController($url)
    {
        if (!empty($url[0]) && isset($url[0])) {
            if (file_exists('../app/Controllers/' . ucfirst($url[0]) . 'Controller.php')) {
                $this->controller = ucfirst($url[0]);
            } else {
                $this->pageNotFound = true;
            }
        }

        require '../app/Controllers/' . $this->controller . 'Controller.php';
        $class = 'App\\Controllers\\' . $this->controller . 'Controller';
        $this->controller = new $class();
    }

    private function getMethod($url)
    {
        if (!empty($url[1]) && isset($url[1])) {
            if (method_exists($this->controller, $url[1]) && !$this->pageNotFound) {
                $this->method = $url[1];
            } else {
                $this->method = 'pageNotFound';
            }
        }
    }

    private function getParams($params)
    {
        if (count($params) > 2) {
            $this->params = array_slice($params, 2);
        }
    }
}
