<?php

namespace Iferas93\Mp3quranWrapper;


use Iferas93\Mp3quranWrapper\Exception\AuthorizationException;
use Iferas93\Mp3quranWrapper\Exception\BadRequestException;
use Iferas93\Mp3quranWrapper\Exception\ConflictException;
use Iferas93\Mp3quranWrapper\Exception\NotFoundException;
use Iferas93\Mp3quranWrapper\Exception\RequestException;

class Riwayat extends Request
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }

    /**
     * @throws ConflictException
     * @throws AuthorizationException
     * @throws RequestException
     * @throws BadRequestException
     * @throws NotFoundException
     */
    public function get(array $options): static
    {
        $params= http_build_query($options);
        $this->response= $this->request(sprintf("/riwayat?%s",$params));
        return $this;
    }
}
