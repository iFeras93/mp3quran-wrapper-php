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
    protected $response;
    public function __construct(Client $client)
    {
        $this->client= $client;
    }

    /**
     * @param string $endpoint
     * @param string $method
     * @return ResponseInterface
     * @throws AuthorizationException
     * @throws BadRequestException
     * @throws ConflictException
     * @throws NotFoundException
     * @throws RequestException
     */
    protected function request(string $endpoint, string $method = "GET"): \Psr\Http\Message\ResponseInterface
    {
        try {
            return $this->client->guzzleClient()->request($method,ltrim($endpoint,'/'));
        }catch (ClientException $e) {
            throw match ($e->getResponse()->getStatusCode()) {
                400 => new BadRequestException($e),
                401 => new AuthorizationException($e),
                404 => new NotFoundException($e),
                409 => new ConflictException($e),
                default => new RequestException($e),
            };
        } catch (GuzzleException $e) {
            // TODO handle connect exception
            throw new RequestException($e);
        }
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

    public function __toString(): string
    {
        return (string)$this->response;
    }

    public function toArray()
    {
        return (array)$this->response;
    }

    public function toJson()
    {
        return json_decode($this->response,true);
    }

    abstract function get(array $options);
}
