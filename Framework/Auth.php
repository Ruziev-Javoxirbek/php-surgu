<?php

namespace Framework;

use App\Models\UserModel;

class Auth
{
    public function enrichByUser(Request $request): Request
    {
        if (array_key_exists('id', $request->getSession()))
        {
            $session = $request->getSession();
            $userModel = new UserModel;
            $request->setUser($userModel->getById((int)$session['id']));
        }
        return $request;
    }
}