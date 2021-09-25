<?php

namespace App\Controllers\Admin\Banner;

use App\Controllers\Base\BaseController;
use Config\Services;

class Banner extends BaseController
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

        $url = getenv('API_URL') . '/banner-service/banners';

        $response = $client->get($url, [
            'headers' => $headers
        ]);


        if ($response->getBody()) {
            $response = $response->getBody()->getContents();
            $result = json_decode($response);
            // dd($result);
            $data["banners"] = $result->data;
            return view('banner/index', $data);
        }
    }



    public function createbanner()
    {
        return view('banner/createbanner');
    }

    public function storebanner()
    {
        $client = new \GuzzleHttp\Client();
        $session = Services::session();
        $request = Services::request();

        $title = $request->getPost('title');
        $type = $request->getPost('media_type');
        $desc = $request->getPost('desc');
        $media = $request->getPost('media_url');
        $launch = $request->getPost('launch_url');
        $internal = $request->getPost('is_internal_launch');
        $accessToken = $session->get('accessToken');


        $headers = [
            'x-access-token' => $accessToken,
            'Content-Type' => 'application/json',
        ];

        if (isset($_FILES['media_url'])) {
            $options = [
                'multipart' => [
                    [
                        'name' => 'file',
                        'contents' => fopen($_FILES['media_url']['tmp_name'], 'r'),
                        'filename' => $_FILES['media_url']['name']
                    ],
                ],
                // 'headers' => [
                //     'Accept'                => 'application/json',

                //     'x-access-token' => $accessToken,
                //     'Content-Type'          => 'multipart/form-data',
                // ]
            ];

            $url = getenv('API_URL') . '/media-service/media/upload';

            $req = $client->post($url, $options);



            $response = $req->getBody()->getContents();

            $result = json_decode($response);
            // var_dump($result);
            // die;

            $media_id = $result->data->path;
        }

        $url = getenv('API_URL') . '/banner-service/banner/create';

        $data = [
            "title" => $title,
            "desc" => $desc,
            "media_url" => $media_id,
            "media_type" => $type,
            "launch_url" => $launch,
            "is_internal_launch" => $internal,
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
