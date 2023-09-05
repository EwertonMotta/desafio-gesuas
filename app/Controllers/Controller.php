<?php

namespace App\Controllers;

use App\Bootstrap\App;

class Controller
{
    public function model($model)
    {
        require_once '../app/Models/' . $model . '.php';
        $class = 'App\\Models\\' . $model;
        return new $class();
    }

    public function view(string $view, array $data = [])
    {
        require '../app/Views/' . $view . '.php';
    }

    public function pageNotFound()
    {
        $this->view('error404');
    }
}
