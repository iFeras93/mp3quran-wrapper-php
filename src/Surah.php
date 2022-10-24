<?php

namespace Iferas93\Mp3quranWrapper;

class Surah extends Request
{
    public function __construct(Client $client)
    {
        parent::__construct($client);
    }


    public function get($contentLanguage = 'ar')
    {
        $params= http_build_query([
            'language'=>$contentLanguage,
        ]);
        $response= $this->request(sprintf('/suwar?%s',$params));
        $this->response= $response->getBody()->getContents();
        return $this;
    }
}
