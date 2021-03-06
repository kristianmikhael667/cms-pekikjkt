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
        $keys = "83e9f659114c8574f2f0b53cabfa2102";
        $headers = [
            'x-access-token' => $accessToken
        ];
        $headerst = [
            'key' => $keys
        ];
        $url = getenv('API_URL') . '/commerce-service/tenant';
        $url2 = "https://api.rajaongkir.com/starter/province";

        $response = $client->get($url, [
            'headers' => $headers
        ]);
        $response2 = $client->get($url2, [
            'headers' => $headerst
        ]);

        if ($response->getBody() || $response2->getBody()) {
            $response = $response->getBody()->getContents();
            $response2 = $response2->getBody()->getContents();
            $result = json_decode($response);
            $result2 = json_decode($response2);
            $data["tenants"] = $result->data;
            $data["provinsi"] = $result2->rajaongkir->results;
            return view('tenant/index', $data);
        }
    }

    public function detailtenant()
    {
        $session = Services::session();
        $request = Services::request();
        $tenant_id = $request->getPost('id');

        $client = new \GuzzleHttp\Client();
        $request = Services::request();
        $accessToken = $session->get('accessToken');

        $headers = [
            'x-access-token' => $accessToken
        ];

        $response = $client->get(getenv('API_URL') . '/commerce-service/tenant/' . $tenant_id, [
            'headers' => $headers
        ]);
        $response = $response->getBody()->getContents();
        $result = json_decode($response);
        echo json_encode($result);
    }

    public function excel()
    {
        $data = array();
        $session = Services::session();
        $client = new \GuzzleHttp\Client();
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken
        ];
        $url_product = getenv('API_URL') . '/commerce-service/product';
        $url_users = getenv('API_URL') . '/user-service/users';
        $url_tenant = getenv('API_URL') . '/commerce-service/tenant';

        // response product
        $response = $client->get($url_product, [
            'headers' => $headers
        ]);

        //response user
        $response2 = $client->get($url_users, [
            'headers' => $headers
        ]);

        //response tenant
        $response3 = $client->get($url_tenant, [
            'headers' => $headers
        ]);
        if ($response->getBody() && $response2->getBody() && $response3->getBody()) {

            //response product
            $response = $response->getBody()->getContents();
            $result = json_decode($response);

            //response user
            $response2 = $response2->getBody()->getContents();
            $result2 = json_decode($response2);

            //response tenant
            $response3 = $response3->getBody()->getContents();
            $result3 = json_decode($response3);

            $data["product"] = $result->data;
            $data["users"] = $result2->data;
            $data["tenant"] = $result3->data;

            return view('tenant/exceltenantproduct', $data);
        }
    }

    public function tenantproduct()
    {
        $data = array();
        $session = Services::session();
        $client = new \GuzzleHttp\Client();
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken
        ];
        $url_product = getenv('API_URL') . '/commerce-service/product';
        $url_users = getenv('API_URL') . '/user-service/users';
        $url_tenant = getenv('API_URL') . '/commerce-service/tenant';

        // response product
        $response = $client->get($url_product, [
            'headers' => $headers
        ]);

        //response user
        $response2 = $client->get($url_users, [
            'headers' => $headers
        ]);

        //response tenant
        $response3 = $client->get($url_tenant, [
            'headers' => $headers
        ]);
        if ($response->getBody() && $response2->getBody() && $response3->getBody()) {

            //response product
            $response = $response->getBody()->getContents();
            $result = json_decode($response);

            //response user
            $response2 = $response2->getBody()->getContents();
            $result2 = json_decode($response2);

            //response tenant
            $response3 = $response3->getBody()->getContents();
            $result3 = json_decode($response3);

            $data["product"] = $result->data;
            $data["users"] = $result2->data;
            $data["tenant"] = $result3->data;

            return view('tenant/tenantproduct', $data);
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

    public function updatetenant()
    {
        $client = new \GuzzleHttp\Client();
        $session = Services::session();
        $request = Services::request();

        $tenant_uid = $request->getPost('tenantuid');
        $tenant_name = $request->getPost('tenantname');
        $tenant_number = $request->getPost('tenantnumber');
        $tenant_type = $request->getPost('tenanttype');
        $tenant_address = $request->getPost('tenantaddress');
        $tenant_district = $request->getPost('tenantdistrict');
        $tenant_id_district = $request->getPost('tenantiddistrict');
        $accessToken = $session->get('accessToken');
        $headers = [
            'x-access-token' => $accessToken,
            'Content-Type'        => 'application/json',
        ];
        $data = [
            "tenant_name" => $tenant_name,
            "tenant_phone" => $tenant_number,
            "tenant_type" => $tenant_type,
            "tenant_address" => $tenant_address,
            "tenant_phone" => $tenant_number,
            "sub_district" => $tenant_district,
            "tenant_phone" => $tenant_number,
            "tenantiddistrict" => $tenant_id_district
        ];

        $url =  getenv('API_URL') . '/commerce-service/tenant/' . $tenant_uid;

        $req = $client->put(
            $url,
            [
                "body" => json_encode($data),
                "headers" => $headers
            ]
        );
    }
}
