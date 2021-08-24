<?php

use Config\Services;


function allUsers()
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
        return $result;
    }
}
