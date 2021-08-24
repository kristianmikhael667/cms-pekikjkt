<?php

namespace App\Controllers\Admin\Tenant;

use App\Controllers\Base\BaseController;
use Config\Services;

class Tenant extends BaseController
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
        $url = getenv('API_URL') . '/commerce-service/tenant';

        $response = $client->get($url, [
            'headers' => $headers
        ]);

        if ($response->getBody()) {
            $response = $response->getBody()->getContents();
            $result = json_decode($response);
            $data["tenants"] = $result->data;
            return view('tenant/index', $data);
        }
    }

    public function createtenant()
    {
        $data = array();

        $session = Services::session();
        $client = new \GuzzleHttp\Client();
        $keys = "83e9f659114c8574f2f0b53cabfa2102";
        $headers = [
            'key' => $keys
        ];
        $url = "https://api.rajaongkir.com/starter/province";
        $response = $client->get($url, [
            'headers' => $headers
        ]);
        $response->getBody();
        $response = $response->getBody()->getContents();
        $result = json_decode($response);
        $data["provinsi"] = $result->rajaongkir->results;
        return view('tenant/create', $data);
    }

    public function createcity()
    {
        $client = new \GuzzleHttp\Client();
        $request = Services::request();
        $id = $request->getPost('id');
        $keys = "83e9f659114c8574f2f0b53cabfa2102";
        $headers = [
            'key' => $keys
        ];
        $url = "https://api.rajaongkir.com/starter/city?province=" . $id;

        $response = $client->get($url, [
            'headers' => $headers
        ]);
        $response->getBody();
        $response = $response->getBody()->getContents();
        echo json_encode($response);
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
