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

    public function detailuser()
    {
        $session = Services::session();
        $request = Services::request();
        $user_id = $request->getPost('id');

        $client = new \GuzzleHttp\Client();
        $request = Services::request();
        $accessToken = $session->get('accessToken');

        $headers = [
            'x-access-token' => $accessToken
        ];

        $response = $client->get(getenv('API_URL') . '/user-service/user/' . $user_id, [
            'headers' => $headers
        ]);
        $response = $response->getBody()->getContents();
        $result = json_decode($response);
        // var_dump($result);
        // die();
        echo json_encode($result);
        // return json_encode([
        //     "_id" => $result->data->_id,
        //     "email" => $result->data->email,
        //     "name" => $result->data->name,
        //     "identity_number" => $result->data->identity_number,
        //     "gender" => $result->data->gender,
        //     "phone_number" => $result->data->phone_number,
        //     "avatar_url" => $result->data->avatar_url
        // ]);
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

    public function updateuser()
    {
        $client = new \GuzzleHttp\Client();
        $session = Services::session();
        $request = Services::request();

        $user_uid = $request->getPost('useruid');
        $user_name = $request->getPost('userfullname');
        $user_number = $request->getPost('userphonenumber');
        $user_roletype = $request->getPost('userrole');
        $user_gender = $request->getPost('usergender');
        $user_email = $request->getPost('useremail');
        $user_id_district = $request->getPost('useridentitynumber');
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken,
            'Content-Type'        => 'application/json',
        ];
        $data = [
            "_id" => $user_uid,
            "name" => $user_name,
            "phone_number" => $user_number,
            "role" => $user_roletype,
            "gender" => $user_gender,
            "email" => $user_email,
            "identity_number" => $user_id_district,
        ];
        // var_dump($data);
        // die;
        $url =  getenv('API_URL') . '/user-service/user/' . $user_uid;

        $req = $client->put(
            $url,
            [
                "body" => json_encode($data),
                "headers" => $headers
            ]
        );
    }
}
