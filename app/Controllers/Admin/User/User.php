<?php

namespace App\Controllers\Admin\User;

use App\Controllers\Base\BaseController;
use Config\Services;

class User extends BaseController
{
    public function index()
    {
        $data = array();

        $session = Services::session();
        $client = new \GuzzleHttp\Client();
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken
        ];
        $url = getenv('API_URL') . '/user-service/users';

        $response = $client->get($url, [
            'headers' => $headers
        ]);

        if ($response->getBody()) {
            $response = $response->getBody()->getContents();
            $result = json_decode($response);
            $data["users"] = $result->data;
            return view('user/index', $data);
        }
    }

    public function seller()
    {
        $data = array();

        $session = Services::session();
        $client = new \GuzzleHttp\Client();
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken
        ];
        $url = getenv('API_URL') . '/user-service/users';

        $response = $client->get($url, [
            'headers' => $headers
        ]);
        if ($response->getBody()) {
            $response = $response->getBody()->getContents();
            $result = json_decode($response);

            $data["users"] = $result->data;
            return view('user/seller', $data);
        }
    }

    public function createuser()
    {
        return view('user/create');
    }

    public function postuser()
    {
        $client = new \GuzzleHttp\Client();
        $session = Services::session();
        $request = Services::request();

        $nama = $request->getPost('nama');
        $noktp = $request->getPost('noktp');
        $gender = $request->getPost('gender');
        $email = $request->getPost('email');
        $nomor = $request->getPost('nomor');
        $password = $request->getPost('password');
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken,
            'Content-Type'        => 'application/json',

        ];
        var_dump($headers);

        $url = getenv('API_URL') . '/user-service/signup';

        $data = [
            "email" => $email,
            "name" => $nama,
            "password" => $password,
            "role" => "seller",
            "identity_number" => $noktp,
            "gender" => $gender,
            "phone_number" => $nomor,
            "firebase_token" => "xxxx",
            "avatar_url" => "gambar.jpg"
        ];
        $req = $client->post(
            $url,
            [
                "body" => json_encode($data),
                'headers' => $headers
            ]
        );
        $response = $req->getBody()->getContents();
        $result = json_decode($response);
    }
}
