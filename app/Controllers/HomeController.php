<?php

namespace App\Controllers;

use App\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }
}
