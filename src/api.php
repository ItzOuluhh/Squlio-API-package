<?php

namespace squlioApi;
use GuzzleHttp\Client;

class Api
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getUser()
    {
        $client = new Client([
            'base_uri' => 'https://api.squlio.nl/',
            'headers' => [
                'Authorization' => $this->apiKey,
                'Accept' => 'application/json',
            ]
        ]);

        $response = $client->get('/v1/users');

        return json_decode($response->getBody(), true);
    }
}
