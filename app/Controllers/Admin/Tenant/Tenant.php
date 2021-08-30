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

    public function posttenant()
    {
        $client = new \GuzzleHttp\Client();
        $session = Services::session();
        $request = Services::request();

        $nama = $request->getPost('nama');
        $nohp = $request->getPost('nohp');
        $address = $request->getPost('address');
        $district = $request->getPost('district');
        $iddistrict = $request->getPost('iddistrict');
        $provinsi_id = $request->getPost('provinsi');
        $provinsi_name = $request->getPost('provinsiname');
        $city_id = $request->getPost('city');
        $city_name = $request->getPost('cityname');
        $postal = $request->getPost('postal');
        $owner = $request->getPost('owner');
        $lat = $request->getPost('lat');
        $long = $request->getPost('long');
        $accessToken = $session->get('accessToken');

        // die(var_dump($nama . ' ' . $nohp . ' ' . $address . ' ' . $district . ' ' . $provinsi_name . ' ' . $provinsi_id . ' ' . $city_name . ' ' . $city_id . ' ' . $postal . ' ' . $owner . ' ' . $lat . ' ' . $long));


        $headers = [
            'x-access-token' => $accessToken,
            'Content-Type'        => 'application/json',
        ];

        $url = getenv('API_URL') . '/commerce-service/tenant';

        $data = [
            "tenant_name" => $nama,
            "tenant_address" => $address,
            "tenant_phone" => $nohp,
            "tenant_logo" => "https://pbs.twimg.com/media/CcuQQAkUkAETLEz.jpg",
            "tenant_lat" => $lat,
            "tenant_long" => $long,
            "postal_code" => $postal,
            "owner" => $owner,
            "province_id" => $provinsi_id,
            "city_id" => $city_id,
            "sub_district_id" => $iddistrict,
            "province" => $provinsi_name,
            "city" => $city_name,
            "sub_district" => $district,
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
