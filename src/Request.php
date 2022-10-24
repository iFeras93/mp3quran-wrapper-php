<?php

namespace Iferas93\Mp3quranWrapper;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Iferas93\Mp3quranWrapper\Exception\AuthorizationException;
use Iferas93\Mp3quranWrapper\Exception\BadRequestException;
use Iferas93\Mp3quranWrapper\Exception\ConflictException;
use Iferas93\Mp3quranWrapper\Exception\NotFoundException;
use Iferas93\Mp3quranWrapper\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

abstract class Request
{
    protected Client $client;
    public function __construct(Client $client)
    {
        $this->client= $client;
    }


    /**
     * @param string $endpoint
     * @param string $method
     */
    protected function request(string $endpoint, string $method = "GET")
    {
        return $this->client->guzzleClient()->request($method,ltrim($endpoint,'/'));
    }


    /**
     * @param string $endpoint
     * @param string $method
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    protected function requestAsync(string $endpoint, string $method = "GET"): \GuzzleHttp\Promise\PromiseInterface
    {
        return $this->client->guzzleClient()->requestAsync($method,ltrim($endpoint,'/'));
    }
}
