<?php

namespace App\Services;
use GuzzleHttp\Exception\GuzzleException;
use Otis22\VetmanagerRestApi\Headers;
use Otis22\VetmanagerRestApi\Headers\Auth\ApiKey;
use GuzzleHttp\Client;
class ApiClient
{
    protected Client $client;
    protected const PATH_API = '/rest/api/';
    protected Headers\WithAuth $authHeaders;
    private string $apiKey;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => config('app.vetmanager_url')]);
        $this->apiKey = config('app.vetmanager_api');
        $this->authHeaders = new Headers\WithAuth(
            new Headers\Auth\ByApiKey(
                new ApiKey($this->apiKey)
            )
        );
    }

    /**
     * @throws GuzzleException
     */
    public function send(string $method, string $endpoint, ?array $data = null)
    {
        $options = ['headers' => $this->authHeaders->asKeyValue()];

        if ($data !== null && $method === "POST") {
            $options['body'] = json_encode($data);
        }

        $response = $this->client->request(
            $method,
            self::PATH_API . $endpoint,
            $options
        );

        return json_decode($response->getBody(), true);
    }
}
