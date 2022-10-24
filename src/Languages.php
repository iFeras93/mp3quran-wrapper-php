<?php

namespace Iferas93\Mp3quranWrapper;

use Iferas93\Mp3quranWrapper\Exception\AuthorizationException;
use Iferas93\Mp3quranWrapper\Exception\BadRequestException;
use Iferas93\Mp3quranWrapper\Exception\ConflictException;
use Iferas93\Mp3quranWrapper\Exception\NotFoundException;
use Iferas93\Mp3quranWrapper\Exception\RequestException;

class Languages extends Request
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }


    public function get()
    {
        $response= $this->request('/languages');
        return json_decode($response->getBody()->getContents());
    }
}
