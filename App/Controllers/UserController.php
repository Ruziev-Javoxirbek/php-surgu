<?php

namespace App\Controllers;

use App\Models\UserModel;
use Framework\Controller;
use Framework\Request;

class UserController extends Controller
{
    public function index($request)
    {
        $user = $request->getUser();
        $users = new UserModel();
        return $this->view('users.php', ['users' =>  $users->all(), 'user' =>  $request->getUser(), 'message' => $request->getMessage()]);

    }
    public function getById($id, $request)
    {
        $users = new UserModel();
        return $this->view('user.php', [$users->getById($id), 'user' =>  $request->getUser(), 'message' => $request->getMessage()]);

    }

}