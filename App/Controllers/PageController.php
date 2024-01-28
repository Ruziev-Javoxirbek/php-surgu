<?php

namespace App\Controllers;

use Framework\Controller;
use Framework\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
       return $this->view('home.php', ['user' =>  $request->getUser(), 'message' => $request->getMessage()]);
    }
}