<?php

namespace App\Controllers;

use App\Models\UserModel;
use Framework\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = new UserModel();
        return $this->view('users.php', ['users' =>  $users->all()]);

    }
    public function getById($id)
    {
        $users = new UserModel();
        return $this->view('user.php', $users->getById($id));

    }

}