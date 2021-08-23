<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\Base\BaseController;
use Config\Services;

class Logout extends BaseController
{
    public function logout()
    {
        $session = Services::session();
        $session->remove('accessToken');
        $session->remove('refreshToken');
        $session->remove('is_active');
        $session->remove('role');
        $session->remove('_id');
        $session->remove('email');
        $session->remove('name');
        $session->remove('identity_number');
        $session->remove('gender');
        $session->remove('phone_number');
        $session->remove('password');
        $session->remove('avatar_url');
        $session->remove('firebase_token');
    }
}
