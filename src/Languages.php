<?php

namespace Iferas93\Mp3quranWrapper;

use Iferas93\Mp3quranWrapper\Exception\AuthorizationException;
use Iferas93\Mp3quranWrapper\Exception\BadRequestException;
use Iferas93\Mp3quranWrapper\Exception\ConflictException;
use Iferas93\Mp3quranWrapper\Exception\NotFoundException;
use Iferas93\Mp3quranWrapper\Exception\RequestException;

class Languages extends Request
{
    protected $response;
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * @throws AuthorizationException
     * @throws ConflictException
     * @throws RequestException
     * @throws BadRequestException
     * @throws NotFoundException
     */
    public function get(): static
    {
        $response= $this->request('/languages');
        $this->response= $response->getBody()->getContents();
        return $this;
    }
}
