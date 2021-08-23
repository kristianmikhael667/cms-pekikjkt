<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\Base\BaseController;
use Config\Services;
use GuzzleHttp\Client;


class Login extends BaseController
{
    public function index()
    {
        return view('login/index');
    }
    public function log()
    {
        $session = session();
        $data = array();

        $session = Services::session();
        $request = Services::request();

        $username = $request->getPost('username');
        $password = $request->getPost('password');

        $client = new \GuzzleHttp\Client();
        $url = getenv('API_URL') . '/user-service/login';

        $req = $client->post(
            $url,
            [
                "form_params" => [
                    "phone_number" => "$username",
                    "password" => "$password",
                ]
            ]
        );

        $response = $req->getBody()->getContents();
        $result = json_decode($response);
        if ($result) {
            $data['accessToken'] = $result->accessToken;
            $data['refreshToken'] = $result->refreshToken;
            $data['name'] = $result->data->name;
            $data['phone_number'] = $result->data->phone_number;
            $session->set($data);
            return view('dashboard/index', $data);
        }
    }
}
