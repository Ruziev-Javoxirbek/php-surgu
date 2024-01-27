<?php

namespace App\Controllers;

use Framework\Controller;

class PageController extends Controller
{
    public function index(array $arr)
    {
        return $this->view('index.php', ['arr' => $arr]);
    }

}