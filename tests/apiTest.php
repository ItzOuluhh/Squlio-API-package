<?php

namespace apiBeta;

use GuzzleHttp\Client;

class betaApi
{
    protected $baseUrl;
    protected $apiKey;

    public function __construct($baseUrl, $apiKey)
    {
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    public function getUser()
    {
        $client = new Client([
            'base_uri' => $this->baseUrl,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Accept' => 'application/json',
            ]
        ]);

        $response = $client->get('/v1/roosters');

        return json_decode($response->getBody(), true);
    }
}
